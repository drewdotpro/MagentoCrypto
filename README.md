MagentoCrypto
=============

#### Currently only tested on Magento 1.9.0.1 - USE AT YOUR OWN RISK!

## Installing MagentoCrypto

#### Modgit

BubbleCode actually has a great tutorial on installing Magento modules with modgit (including it's install), so please use [their guide](http://www.bubblecode.net/en/2012/02/06/install-magento-modules-with-modgit/).

Once you've installed modgit and are ready to start installing modules ontop of Magento, enter the following command:

```
modgit clone magentocrypto https://github.com/jkenneydaniel/MagentoCrypto.git
```

This will install the repository in the necessary locations.

## Installing Coinbase library for support with MagentoCrypto

```
Note: Not available yet.
```

Because of the way Coinbase has setup their repository, it's impossible to include it as a submodule under the lib/ folder. However, you shouldn't experience any issues doing the following:


```
modgit clone coinbase https://github.com/coinbase/coinbase-php.git
```