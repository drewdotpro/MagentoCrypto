MagentoCrypto
=============

#### Currently only tested on Magento 1.9.0.1 - USE AT YOUR OWN RISK!

## Installing MagentoCrypto

#### Modgit

BubbleCode actually has a great tutorial on installing Magento modules with modgit (including it's install), so please use [their guide](http://www.bubblecode.net/en/2012/02/06/install-magento-modules-with-modgit/).

Once you've installed modgit and are ready to start installing modules ontop of Magento, enter the following command from the root of your Magento installation:

```
modgit clone magentocrypto https://github.com/jkenneydaniel/MagentoCrypto.git
```

This will install the repository in the necessary locations. Once that is done, flush the entire Cache Storage of Magneto from the Cache Management page.
