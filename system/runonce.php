<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Winans Creative 2009, Intelligent Spark 2010, iserv.ch GmbH 2010
 * @author     Fred Bliss <fred.bliss@intelligentspark.com>
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


class IsotopeRunonce extends Frontend
{

	/**
	 * Initialize the object
	 */
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Run the controller
	 */
	public function run()
	{
		// Cancel if shop has not yet been installed
		if (!$this->Database->tableExists('tl_store') && !$this->Database->tableExists('tl_iso_config'))
			return;
			
		$this->renameTables();
		$this->renameFields();
		$this->updateProductCategories();
		$this->updateStoreConfigurations();
		$this->updateOrders();
		$this->updateImageSizes();
		$this->updateAttributes();
		$this->updateFrontendModules();
		$this->updateFrontendTemplates();
		$this->refreshDatabaseFile();
		
		if($this->Database->tableExists('tl_product_attribute_types'))
			$this->Database->query("DROP TABLE tl_product_attribute_types");
			
		// Checkout method has been renamed from "login" to "member" to prevent a problem with palette of the login module
		$this->Database->query("UPDATE tl_module SET iso_checkout_method='member' WHERE iso_checkout_method='login'");
		
		// Drop fields that are now part of the default DCA
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='alias'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='visibility'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='name'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='teaser'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='description'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='tax_class'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='main_image'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='sku'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='quantity'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='shipping_exempt'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='price'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='price_override'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='use_price_override'");
		$this->Database->query("DELETE FROM tl_iso_attributes WHERE field_name='weight'");
		
		// Because configuration has been changed, we cannot use the existing cart data
		$this->Database->query("DELETE FROM tl_iso_cart_items");
		$this->Database->query("DELETE FROM tl_iso_cart");
	}
	
	
	private function renameTables()
	{
		if ($this->Database->tableExists('tl_product_data')) $this->Database->query("ALTER TABLE tl_product_data RENAME tl_iso_products");
		if ($this->Database->tableExists('tl_product_types')) $this->Database->query("ALTER TABLE tl_product_types RENAME tl_iso_producttypes");
		if ($this->Database->tableExists('tl_product_attributes')) $this->Database->query("ALTER TABLE tl_product_attributes RENAME tl_iso_attributes");
		if ($this->Database->tableExists('tl_product_downloads')) $this->Database->query("ALTER TABLE tl_product_downloads RENAME tl_iso_downloads");
		if ($this->Database->tableExists('tl_product_categories')) $this->Database->query("ALTER TABLE tl_product_categories RENAME tl_iso_product_categories");
		if ($this->Database->tableExists('tl_tax_class')) $this->Database->query("ALTER TABLE tl_tax_class RENAME tl_iso_tax_class");
		if ($this->Database->tableExists('tl_tax_rate')) $this->Database->query("ALTER TABLE tl_tax_rate RENAME tl_iso_tax_rate");
		if ($this->Database->tableExists('tl_payment_modules')) $this->Database->query("ALTER TABLE tl_payment_modules RENAME tl_iso_payment_modules");
		if ($this->Database->tableExists('tl_shipping_modules')) $this->Database->query("ALTER TABLE tl_shipping_modules RENAME tl_iso_shipping_modules");
		if ($this->Database->tableExists('tl_shipping_options')) $this->Database->query("ALTER TABLE tl_shipping_options RENAME tl_iso_shipping_options");
		if ($this->Database->tableExists('tl_related_categories')) $this->Database->query("ALTER TABLE tl_related_categories RENAME tl_iso_related_categories");
		if ($this->Database->tableExists('tl_related_products')) $this->Database->query("ALTER TABLE tl_related_products RENAME tl_iso_related_products");
		if ($this->Database->tableExists('tl_address_book')) $this->Database->query("ALTER TABLE tl_address_book RENAME tl_iso_addresses");
		if ($this->Database->tableExists('tl_store')) $this->Database->query("ALTER TABLE tl_store RENAME tl_iso_config");
		if ($this->Database->tableExists('tl_cart')) $this->Database->query("ALTER TABLE tl_cart RENAME tl_iso_cart");
		if ($this->Database->tableExists('tl_cart_items')) $this->Database->query("ALTER TABLE tl_cart_items RENAME tl_iso_cart_items");
	}
	
	
	private function renameFields()
	{
		// tl_iso_config.store_configuration_name has been renamed to tl_iso_config.name
		if ($this->Database->fieldExists('store_configuration_name', 'tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN store_configuration_name name varchar(255) NOT NULL default ''");
		}
		
		// tl_iso_config.gallery_thumbnail_image_width has been renamed to tl_iso_config.gallery_image_width
		if ($this->Database->fieldExists('gallery_thumbnail_image_width', 'tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN gallery_thumbnail_image_width gallery_image_width int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_iso_config.gallery_thumbnail_image_height has been renamed to tl_iso_config.gallery_image_height
		if ($this->Database->fieldExists('gallery_thumbnail_image_height', 'tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN gallery_thumbnail_image_height gallery_image_height int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_iso_products.visiblity has been renamed to tl_iso_products.published
		if ($this->Database->fieldExists('visibility', 'tl_iso_products'))
		{
			$this->Database->query("ALTER TABLE tl_iso_products CHANGE COLUMN visibility published char(1) NOT NULL default ''");
		}
		
		// tl_product_data.main_image has been renamed to tl_iso_products.images
		if ($this->Database->fieldExists('main_image', 'tl_iso_products'))
		{
			$this->Database->query("ALTER TABLE tl_iso_products CHANGE COLUMN main_image images blob NULL");
		}
		
		// tl_iso_attributes.fieldGroup has been renamed to tl_iso_attributes.legend
		if ($this->Database->fieldExists('fieldGroup', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes CHANGE COLUMN fieldGroup legend varchar(255) NOT NULL default ''");
		}
		
		// tl_iso_addresses.state has been renamed to tl_iso_addresses.subdivision
		if ($this->Database->fieldExists('state', 'tl_iso_addresses') && !$this->Database->fieldExists('subdivision', 'tl_iso_addresses'))
		{
			$this->Database->query("ALTER TABLE tl_iso_addresses CHANGE COLUMN state subdivision varchar(10) NOT NULL default ''");
		}
		
		// tl_iso_attributes.is_required has been renamed to tl_iso_attributes.mandatory
		if ($this->Database->fieldExists('is_required', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes CHANGE COLUMN is_required mandatory char(1) NOT NULL default ''");
		}
		
		// tl_iso_attributes.is_required has been renamed to tl_iso_attributes.mandatory
		if (in_array('isotope_imageselect', $this->Config->getActiveModules()) && $this->Database->fieldExists('size', 'tl_iso_attributes') && !$this->Database->fieldExists('imgSize', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes CHANGE COLUMN size imgSize varchar(64) NOT NULL default ''");
		}
		
		// tl_iso_attributes.is_multiple_select has been renamed to tl_iso_attributes.multiple
		if ($this->Database->fieldExists('is_multiple_select', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes CHANGE COLUMN is_multiple_select multiple char(1) NOT NULL default ''");
		}
		
		// tl_iso_attributes.add_to_product_variants has been renamed to tl_iso_attributes.variant_option
		if ($this->Database->fieldExists('add_to_product_variants', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes CHANGE COLUMN add_to_product_variants variant_option char(1) NOT NULL default ''");
		}
		
		// tl_iso_attributes.use_rich_text_editor has been renamed to tl_iso_attributes.rte
		if ($this->Database->fieldExists('use_rich_text_editor', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes CHANGE COLUMN use_rich_text_editor rte varchar(255) NOT NULL default ''");
			$this->Database->query("UPDATE tl_iso_attributes SET rte='tinyMCE' WHERE rte='1'");
		}
		
		// tl_iso_attributes.option_list has been renamed to tl_iso_attributes.options
		if ($this->Database->fieldExists('option_list', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes CHANGE COLUMN option_list options blob NULL");
		}
		
		// tl_iso_config.state has been renamed to tl_iso_config.subdivision
		if ($this->Database->fieldExists('state', 'tl_iso_config') && !$this->Database->fieldExists('subdivision', 'tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN state subdivision varchar(10) NOT NULL default ''");
		}
		
		// tl_iso_config.street has been renamed to tl_iso_config.street_1
		if ($this->Database->fieldExists('street', 'tl_iso_config') && !$this->Database->fieldExists('street_1', 'tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN street street_1 varchar(255) NOT NULL default ''");
		}
		
		// tl_module.store_id has been renamed to tl_module.iso_config_id
		if ($this->Database->fieldExists('store_id', 'tl_module') && !$this->Database->fieldExists('iso_config_id', 'tl_module'))
		{
			$this->Database->query("ALTER TABLE tl_module CHANGE COLUMN store_id iso_config_id int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_module.store_ids has been renamed to tl_module.iso_config_ids
		if ($this->Database->fieldExists('store_ids', 'tl_module') && !$this->Database->fieldExists('iso_config_ids', 'tl_module'))
		{
			$this->Database->query("ALTER TABLE tl_module CHANGE COLUMN store_ids iso_config_ids blob NULL");
		}
		
		// tl_module.columns has been renamed to tl_module.iso_cols
		if ($this->Database->fieldExists('columns', 'tl_module') && !$this->Database->fieldExists('iso_cols', 'tl_module'))
		{
			$this->Database->query("ALTER TABLE tl_module CHANGE COLUMN columns iso_cols int(1) unsigned NOT NULL default '1'");
			$this->Database->query("UPDATE TABLE tl_module SET iso_cols=1 WHERE iso_cols=0");
		}
				
		// tl_iso_orders.store_id has been renamed to tl_iso_orders.config_id
		if ($this->Database->fieldExists('store_id', 'tl_iso_orders') && !$this->Database->fieldExists('config_id', 'tl_iso_orders'))
		{
			$this->Database->query("ALTER TABLE tl_iso_orders CHANGE COLUMN store_id config_id int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_iso_config.isDefaultStore has been renamed to tl_iso_config.fallback
		if ($this->Database->fieldExists('isDefaultStore', 'tl_iso_config') && !$this->Database->fieldExists('fallback', 'tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN isDefaultStore fallback char(1) NOT NULL default ''");
		}
		
		// tl_user.iso_stores has been renamed to tl_user.iso_configs
		if ($this->Database->fieldExists('iso_stores', 'tl_user') && !$this->Database->fieldExists('iso_configs', 'tl_user'))
		{
			$this->Database->query("ALTER TABLE tl_user CHANGE COLUMN iso_stores iso_configs blob NULL");
		}
		
		// tl_user_group.iso_stores has been renamed to tl_user_group.iso_configs
		if ($this->Database->fieldExists('iso_stores', 'tl_user_group') && !$this->Database->fieldExists('iso_configs', 'tl_user_group'))
		{
			$this->Database->query("ALTER TABLE tl_user_group CHANGE COLUMN iso_stores iso_configs blob NULL");
		}
		
		// tl_iso_tax_rate.store has been renamed to tl_iso_tax_rate.config
		if ($this->Database->fieldExists('store', 'tl_iso_tax_rate') && !$this->Database->fieldExists('config', 'tl_iso_tax_rate'))
		{
			$this->Database->query("ALTER TABLE tl_iso_tax_rate CHANGE COLUMN store config int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_page.isotopeStoreConfig has been renamed to tl_page.iso_config
		if ($this->Database->fieldExists('isotopeStoreConfig', 'tl_page') && !$this->Database->fieldExists('iso_config', 'tl_page'))
		{
			$this->Database->query("ALTER TABLE tl_page CHANGE COLUMN isotopeStoreConfig iso_config int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_iso_cart_items.quantity_requested has been renamed to tl_iso_cart_items.product_quantity
		if ($this->Database->fieldExists('quantity_requested', 'tl_iso_cart_items') && !$this->Database->fieldExists('product_quantity', 'tl_iso_cart_items'))
		{
			$this->Database->query("ALTER TABLE tl_iso_cart_items CHANGE COLUMN quantity_requested product_quantity int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_iso_order_items.quantity_sold has been renamed to tl_iso_order_items.product_quantity
		if ($this->Database->fieldExists('quantity_sold', 'tl_iso_order_items') && !$this->Database->fieldExists('product_quantity', 'tl_iso_order_items'))
		{
			$this->Database->query("ALTER TABLE tl_iso_order_items CHANGE COLUMN quantity_sold product_quantity int(10) unsigned NOT NULL default '0'");
		}
		
		// tl_iso_addresses.street has been renamed to tl_iso_addresses.street_1
		if ($this->Database->fieldExists('street', 'tl_iso_addresses') && !$this->Database->fieldExists('street_1','tl_iso_addresses'))
		{
			$this->Database->query("ALTER TABLE tl_iso_addresses CHANGE COLUMN street street_1 varchar(255) NOT NULL default ''");
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN street street_1 varchar(255) NOT NULL default ''");
			$objStores = $this->Database->query("SELECT * FROM tl_iso_config");
			
			while( $objStores->next() )
			{
				$arrBilling = deserialize($objStores->billing_fields, true);
				$arrShipping = deserialize($objStores->shipping_fields, true);
				
				if (($k = array_search('street', $arrBilling)) !== false)
				{
					$arrBilling[$k] = 'street_1';
				}
				
				if (($k = array_search('street', $arrShipping)) !== false)
				{
					$arrShipping[$k] = 'street_1';
				}
				
				$this->Database->prepare("UPDATE tl_iso_config SET shipping_fields=?, billing_fields=? WHERE id=?")->execute(serialize($arrShipping), serialize($arrBilling), $objStores->id);
			}
		}
		
		// "Orders without shipping" has been changed from value "0" to "-1"
		$objPayments = $this->Database->execute("SELECT * FROM tl_iso_payment_modules WHERE shipping_modules!=''");
		while( $objPayments->next() )
		{
			$arrShipping = deserialize($objPayments->shipping_modules);
			
			if (is_array($arrShipping) && in_array(0, $arrShipping))
			{
				unset($arrShipping[array_search(0, $arrShipping)]);
				$arrShipping[] = -1;
				$this->Database->query("UPDATE tl_iso_payment_modules SET shipping_modules='" . serialize($arrShipping) . "' WHERE id={$objPayments->id}");
			}
		}
	}
	
	
	private function updateProductCategories()
	{
		if ($this->Database->tableExists('tl_product_to_category'))
		{
			$this->Database->query("CREATE TABLE IF NOT EXISTS `tl_product_categories` (`id` int(10) unsigned NOT NULL auto_increment,`pid` int(10) unsigned NOT NULL default '0',`tstamp` int(10) unsigned NOT NULL default '0',`page_id` int(10) unsigned NOT NULL default '0',PRIMARY KEY  (`id`),KEY `pid` (`pid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
			
			$this->Database->query("INSERT INTO tl_product_categories (pid,tstamp,page_id) (SELECT product_id AS pid, tstamp, pid AS page_id FROM tl_product_to_category)");
			
			$this->Database->query("DROP TABLE tl_product_to_category");
		}
	}
	
	
	private function updateStoreConfigurations()
	{
		if ($this->Database->fieldExists('countries', 'tl_iso_config') && !$this->Database->fieldExists('shipping_countries','tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN countries shipping_countries blob NULL");
			$this->Database->query("ALTER TABLE tl_iso_config ADD COLUMN billing_countries blob NULL");
			$this->Database->query("UPDATE tl_iso_config SET billing_countries=shipping_countries");
		}
		
		if ($this->Database->fieldExists('address_fields', 'tl_iso_config') && !$this->Database->fieldExists('shipping_fields','tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config CHANGE COLUMN address_fields shipping_fields blob NULL");
			$this->Database->query("ALTER TABLE tl_iso_config ADD COLUMN billing_fields blob NULL");
			$this->Database->query("UPDATE tl_iso_config SET billing_fields=shipping_fields");
		}
		
		if ($this->Database->fieldExists('gallery_size', 'tl_iso_config') && !$this->Database->fieldExists('imageSizes','tl_iso_config'))
		{
			$this->Database->query("ALTER TABLE tl_iso_config ADD COLUMN imageSizes blob NULL");
			
			$objConfigs = $this->Database->execute("SELECT * FROM tl_iso_config");
			
			while( $objConfigs->next() )
			{
				$arrGallery = deserialize($objConfigs->gallery_size, true);
				$arrThumbnail = deserialize($objConfigs->thumbnail_size, true);
				$arrMedium = deserialize($objConfigs->medium_size, true);
				$arrLarge = deserialize($objConfigs->large_size, true);
				
				$arrSizes = array
				(
					array
					(
						'name'		=> 'gallery',
						'width'		=> $arrGallery[0],
						'height'	=> $arrGallery[1],
						'mode'		=> $arrGallery[2],
						'watermark'	=> $objConfigs->gallery_watermark,
						'position'	=> $objConfigs->watermark_position,
					),
					array
					(
						'name'		=> 'thumbnail',
						'width'		=> $arrThumbnail[0],
						'height'	=> $arrThumbnail[1],
						'mode'		=> $arrThumbnail[2],
						'watermark'	=> $objConfigs->thumbnail_watermark,
						'position'	=> $objConfigs->watermark_position,
					),
					array
					(
						'name'		=> 'medium',
						'width'		=> $arrMedium[0],
						'height'	=> $arrMedium[1],
						'mode'		=> $arrMedium[2],
						'watermark'	=> $objConfigs->medium_watermark,
						'position'	=> $objConfigs->watermark_position,
					),
					array
					(
						'name'		=> 'large',
						'width'		=> $arrLarge[0],
						'height'	=> $arrLarge[1],
						'mode'		=> $arrLarge[2],
						'watermark'	=> $objConfigs->large_watermark,
						'position'	=> $objConfigs->watermark_position,
					),
				);
				
				$this->Database->query("UPDATE tl_iso_config SET imageSizes='" . serialize($arrSizes) . "' WHERE id={$objConfigs->id}");
			}
		}
	}
	
	
	private function updateOrders()
	{
/*
		if ($this->Database->fieldExists('product_options', 'tl_iso_order_items'))
		{
			$objItems = $this->Database->query("SELECT * FROM tl_iso_order_items");
			
			while( $objItems->next() )
			{
				$arrOld = deserialize($objItems->product_options);
				
				if (is_array($arrOld) && count($arrOld))
				{
					$arrOptions = array();
					$objProduct = unserialize($objItems->product_data);
					
					foreach( $arrOld as $name => $value )
					{
						$arrOptions[$name] = $value['values'][0];
					}
					
					$objProduct->setOptions($arrOptions);
					
					$this->Database->prepare("UPDATE tl_iso_order_items SET product_data=?, product_options='' WHERE id=?")->execute(serialize($objProduct), $objItems->id);
				}
			}
		}
*/
		
		if (!$this->Database->fieldExists('date_shipped', 'tl_iso_orders'))
		{
			$this->Database->query("ALTER TABLE tl_iso_orders ADD COLUMN date_shipped varchar(10) NOT NULL default ''");
		}
		
		$this->Database->query("UPDATE tl_iso_orders SET date_shipped=date, status='processing' WHERE status='shipped'");
	}
	
	
	private function updateAttributes()
	{
		// Renamed attribute types
		$this->Database->query("UPDATE tl_iso_attributes SET type='text', rgxp='date' WHERE type='datetime' AND rgxp=''");
		$this->Database->query("UPDATE tl_iso_attributes SET type='text', rgxp='digit' WHERE (type='integer' OR type='decimal') AND rgxp=''");
		$this->Database->query("UPDATE tl_iso_attributes SET type='text' WHERE type='integer' OR type='decimal' OR type='datetime'");
		$this->Database->query("UPDATE tl_iso_attributes SET type='textarea' WHERE type='longtext'");
		$this->Database->query("UPDATE tl_iso_attributes SET type='radio' WHERE type='options'");
		$this->Database->query("UPDATE tl_iso_attributes SET type='mediaManager' WHERE type='media'");
				
		if (!$this->Database->fieldExists('foreignKey', 'tl_iso_attributes'))
		{
			$this->Database->query("ALTER TABLE tl_iso_attributes ADD COLUMN foreignKey varchar(64) NOT NULL default ''");
			$this->Database->query("UPDATE tl_iso_attributes SET foreignKey=CONCAT(list_source_table, '.', list_source_field) WHERE use_alternate_source='1'");
		}
	}
	
	
	private function updateImageSizes()
	{
		$arrUpdate = array();
		
		if ($this->Database->fieldExists('gallery_image_width', 'tl_iso_config') && $this->Database->fieldExists('gallery_image_height', 'tl_iso_config'))
		{
			if (!$this->Database->fieldExists('gallery_size', 'tl_iso_config'))
			{
				$this->Database->query("ALTER TABLE tl_iso_config ADD COLUMN gallery_size varchar(64) NOT NULL default ''");
			}
			
			$arrUpdate[] = 'gallery';
		}
		
		if ($this->Database->fieldExists('thumbnail_image_width', 'tl_iso_config') && $this->Database->fieldExists('thumbnail_image_height', 'tl_iso_config'))
		{
			if (!$this->Database->fieldExists('thumbnail_size', 'tl_iso_config'))
			{
				$this->Database->query("ALTER TABLE tl_iso_config ADD COLUMN thumbnail_size varchar(64) NOT NULL default ''");
			}
			
			$arrUpdate[] = 'thumbnail';
		}
		
		if ($this->Database->fieldExists('medium_image_width', 'tl_iso_config') && $this->Database->fieldExists('medium_image_height', 'tl_iso_config'))
		{
			if (!$this->Database->fieldExists('medium_size', 'tl_iso_config'))
			{
				$this->Database->query("ALTER TABLE tl_iso_config ADD COLUMN medium_size varchar(64) NOT NULL default ''");
			}
			
			$arrUpdate[] = 'medium';
		}
		
		if ($this->Database->fieldExists('large_image_width', 'tl_iso_config') && $this->Database->fieldExists('large_image_height', 'tl_iso_config'))
		{
			if (!$this->Database->fieldExists('large_size', 'tl_iso_config'))
			{
				$this->Database->query("ALTER TABLE tl_iso_config ADD COLUMN large_size varchar(64) NOT NULL default ''");
			}
			
			$arrUpdate[] = 'large';
		}
		
		
		if (count($arrUpdate))
		{
			$objStores = $this->Database->query("SELECT * FROM tl_iso_config");
			
			while( $objStores->next() )
			{
				$arrSet = array();
				
				foreach( $arrUpdate as $size )
				{
					$arrSet[$size.'_size'] = serialize(array($objStores->{$size.'_image_width'}, $objStores->{$size.'_image_height'}, 'crop'));
				}
				
				$this->Database->prepare("UPDATE tl_iso_config %s WHERE id=?")->set($arrSet)->execute($objStores->id);
			}
			
			foreach( $arrUpdate as $size )
			{
				// Do not use multiple DROP COLUMN in one ALTER TABLE. It is supported by MySQL, but not standard SQL92
				$this->Database->query("ALTER TABLE tl_iso_config DROP COLUMN ".$size."_image_width");
				$this->Database->query("ALTER TABLE tl_iso_config DROP COLUMN ".$size."_image_height");
			}
		}
	}
	
	
	private function updateFrontendModules()
	{
		$arrUpdate = array
		(
			'isoProductLister'			=> 'iso_productlist',
			'isoProductReader'			=> 'iso_productreader',
			'isoShoppingCart'			=> 'iso_cart',
			'isoCheckout'				=> 'iso_checkout',
			'isoFilterModule'			=> 'iso_productfilter',
			'isoOrderHistory'			=> 'iso_orderhistory',
			'isoOrderDetails'			=> 'iso_orderdetails',
			'isoStoreSwitcher'			=> 'iso_storeswitcher',
			'isoAddressBook'			=> 'iso_addressbook',
			'iso_storeswitcher'			=> 'iso_configswitcher',
		);
		
		foreach( $arrUpdate as $old => $new )
		{
			$objModules = $this->Database->prepare("SELECT * FROM tl_module WHERE type=?")->execute($old);
			
			while( $objModules->next() )
			{
				$cssID = deserialize($objModules->cssID, true);
				$cssID[1] = trim($cssID[1] . ' mod_' . $old);
				
				$this->Database->prepare("UPDATE tl_module SET type=?, cssID=? WHERE id=?")->execute($new, serialize($cssID), $objModules->id);
				
				$objContents = $this->Database->prepare("SELECT * FROM tl_content WHERE type='module' AND module=?")->execute($objModules->id);
			
				while( $objContents->next() )
				{
					$cssID = deserialize($objContents->cssID, true);
					$cssID[1] = trim($cssID[1] . ' mod_' . $old);
					
					$this->Database->prepare("UPDATE tl_content SET cssID=? WHERE id=?")->execute(serialize($cssID), $objContents->id);
				}
			}
		}
	}
	
	
	private function updateFrontendTemplates()
	{
		$arrUpdate = array
		(
			'mod_shopping_cart'			=> 'mod_iso_cart',
			'mod_filters'				=> 'mod_iso_productfilter',
			'mod_orderdetails'			=> 'mod_iso_orderdetails',
			'mod_orderhistory'			=> 'mod_iso_orderhistory',
			'mod_productlist'			=> 'mod_iso_productlist',
			'mod_productreader'			=> 'mod_iso_productreader',
			'mod_storeswitcher'			=> 'mod_iso_storeswitcher',
			'iso_address_book_list'		=> 'mod_iso_addressbook',
			'mod_iso_storeswitcher'		=> 'mod_iso_configswitcher',
		);
		
		$this->import('Files');
		
		foreach( $arrUpdate as $old => $new )
		{
			if (file_exists(TL_ROOT . '/templates/' . $old . '.tpl') && !file_exists(TL_ROOT . '/templates/' . $new . '.tpl'))
			{
				$this->Files->rename('templates/' . $old . '.tpl', 'templates/' . $new . '.tpl');
			}
		}
		
		
		// Move old templates to root folder, they might be in use
		$arrUpdate = array
		(
			'iso_list_featured_product',
			'iso_reader_product_single',
		);
		
		foreach( $arrUpdate as $file )
		{
			if (file_exists(TL_ROOT . '/system/modules/isotope/templates/' . $file . '.tpl') && !file_exists(TL_ROOT . '/templates/' . $file . '.tpl'))
			{
				$this->Files->rename('system/modules/isotope/templates/' . $file . '.tpl', 'templates/' . $file . '.tpl');
			}
		}
	}
	
	
	/**
	 * Regenerate the database.sql to include custom attributes.
	 * This info might have been lost when updating the file via FTP.
	 */
	private function refreshDatabaseFile()
	{
		$this->import('IsotopeDatabase');
		
		$objAttributes = $this->Database->execute("SELECT * FROM tl_iso_attributes");
		
		while( $objAttributes->next() )
		{
			// Skip empty lines
			if (!strlen($objAttributes->field_name) || !strlen($GLOBALS['ISO_ATTR'][$objAttributes->type]['sql']))
				continue;
				
			$this->IsotopeDatabase->add($objAttributes->field_name, $GLOBALS['ISO_ATTR'][$objAttributes->type]['sql']);
		}
	}
}


/**
 * Instantiate controller
 */
$objIsotope = new IsotopeRunonce();
$objIsotope->run();
