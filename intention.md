## Change some things to make isotope more editable and faster

- want to implement a modular price function
- re-structure some classes
- rename some classes for better understanding and seperating
- remove wasted database queries


### help is welcome

###Changelog

- add Isotope/Calculation/Callback.php to library
- take baseprice as base of the Caliculation
- rename tl_iso_baseprice to tl_iso_product_amounts for better seperating
  - update dca-file **!!! have to update db->table->name**
  - update Modelfile 'BasePrice'to 'ProductAmounts'
  - **!!! Have to update Transiflex key respectively renamed language files from tl_iso_baseprice to tl_iso_product_amounts**

- add dca/tl_member_group.php -> add fields to chose baseprice which should be calculated for the FE an chose the default baseprice (e.g. Netto)
- add Isotope/Calculation.php to library 
- add Isotope/Calculation/CalcProdPrices.php to library
- add Hooks $GLOBALS['ISO_HOOKS']['calcBasePriceBefore'][] ,$GLOBALS['ISO_HOOKS']['calcBasePriceAfter'][] to CalcProdPrices
- register new Classes to autoload.php



###TODOS

- modify tl_iso_product with it's Callbacks
- modify tl_iso_producttype
- coding a baseprice widget
- modify fe modules
- add formula as select to dca of shipping, cart, discount and coupon
  - Formula/Prod.json,
  - Formula/Schipping.json,
  - Formula/Cart.json, 
  - Formula/DiscountAndCoupon.json
  
- baseprices should replace tax classes and tax rate
- one baseprice have to chose as default, this default baseprice is base for the other baseprices   
  e.g. bp-def: netto = 100%, bp2 = brutto = netto + 19%, bp3 = brutto2 = netto + 7%

...

### Developer Docu like this would be nice
http://api.drupalcommerce.org/api/Drupal%20Commerce/constants/DC
