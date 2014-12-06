## Change some things to make isotope more editable and faster

- want to implement a modular price function
- re-structure some classes
- rename some classes for better understanding and seperating
- remove wasted database queries


### help is welcome

###Changelog

- add Isotope/Calculation/Callback.php to library
- take baseprice as base of the Caliculation
- rename baseprice to PriceByAmount
- add dca/tl_member_group.php -> add fields to chose baseprice which should be calculated for the FE an chose the default baseprice (e.g. Netto)

###TODOS


- baseprices should replace tax classes and tax rate
- one baseprice have to chose as default, this default baseprice is base for the other baseprices   
  e.g. bp-def: netto = 100%, bp2 = brutto = netto + 19%, bp3 = brutto2 = netto + 7%

...

### Developer Docu like this would be nice
http://api.drupalcommerce.org/api/Drupal%20Commerce/constants/DC
