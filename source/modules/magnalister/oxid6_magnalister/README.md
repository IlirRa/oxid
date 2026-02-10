# magnalister OXID 6 bridge (WIP)

This module is a starting point for integrating magnalister into OXID eShop 6.
It follows the structure of the Magento 2 magnalister module and prepares an OXID-specific Codepool adapter at:

- `Codepool/70_Shop/OXID6`

## What is included

- OXID module metadata (`metadata.php`)
- Module bootstrap that loads `magnalisterlibrary`
- Initial OXID 6 shop adapter class (`ML_OXID6_Shop`)
- OXID admin menu entry (`magnalister > Dashboard`) rendering the magnalister iframe

## Installation

1. Place this module in `source/modules/magnalister/oxid6_magnalister`.
2. Install/require `redgecko/magnalisterlibrary` into the project `vendor/` directory.
3. Activate the module in the OXID admin.
4. Open `magnalister > Dashboard` in admin to load the iframe integration.
5. If needed, adjust `ml_oxid6_library_path` and `ml_oxid6_iframe_url` in module settings.


## How OXID6 Codepool is discovered

The module bootstrap wires discovery before loading the magnalister library:

- defines `ML_SHOP_SYSTEM=OXID6` and `ML_SHOP_ROOT=<module>/Codepool/70_Shop/OXID6`
- prepends `Codepool/70_Shop/OXID6` to PHP `include_path`
- registers an autoloader for classes like `ML_OXID6_*` mapping to `Codepool/70_Shop/OXID6/*.php`

This way, when the library asks for OXID6 shop-specific classes/hooks, the files from `Codepool/70_Shop/OXID6` are resolvable without patching vendor code.

## Next steps

- Port remaining shop abstractions from `Codepool/70_Shop/Magento2` to `Codepool/70_Shop/OXID6`.
- Map OXID order, product, customer, and stock services to magnalister models.
- Add admin controller/routes for magnalister configuration and execution.


## Troubleshooting

If you still see `Call to undefined function oxNew()` during `composer install/update`, make sure your installed module version includes this fix (`>= 0.2.2`).
The bootstrap no longer runs OXID Registry access before the runtime is initialized.
