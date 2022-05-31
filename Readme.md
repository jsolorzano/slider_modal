# slider_modal

_Code that allows to alter the functioning of the slider of the main page of a project based on prestashop._

## Starting

_These instructions allow you to include the code in the proper way to enable the new functionality on the slider in your project._


### Pre requirements 📋

_Before starting, you need to know that that the module contained in this package is developed to work with prestashop in its versions 1.6.x and 1.7.x._

_Your prestashop installation must have the 'sphomeslider' module installed and you must have enabled a slider using said module._


### Installation 🔧

_This module is included in the slider_modal package of the homonymous repository, so you need to clone it and then copy it to the modules folder of your prestashop project:_

1. Clone the repository to the location of your choice:

```
https://github.com/jsolorzano/slider_modal.git
```

2. Copy the 'cms_pages' folder to the modules directory of your prestashop project.

3. Go to the administration panel of your prestashop project and install the new module 'cms_pages'.

4. Configure the module including the urls of the pages that will be used as a filter in the slider.

5. Go to the webservice section of the advanced parameters section of the administration panel and configure the module as a new resource from the webservice, activating it from the key in which it is needed. In this case you only need to have permissions for requests of type GET.

6. Edit the ../themes/sp_topmart/templates/page.tpl file of your project and place the code contained in the page.tpl file of this repository between the 'page_content_container' and 'page_footer_container' blocks.

7. Copy the js validator 'slider_to_modal.js' contained in this repository to the path ../themes/sp_topmart/assets/js/ of your project. This validator will be in charge of applying the changes to the slider, taking into account the urls configured in the 'cms_pages' module. In this validator, the value of the 'url_api' variable must be changed so that it contains the key that is being used with the webservice of the environment where the module is being applied.

8. Edit the ../themes/sp_topmart/templates/_partials/javascript.tpl file of your project and add the code contained in the javascript.tpl file of this repository to the end of it. Where http://domain.test/ must be replaced by the domain of the environment in which the functionality is being enabled.



## Execution 🚀

_Once all the previous steps have been carried out, you will be ready to use the functions provided by the software package._

_This software package will allow you to configure a list of urls that will be used as a filter by the js validator, with which you can determine which elements of the slider should open in a modal window and which should not._



---
⌨️ por [jsolorzano](https://github.com/jsolorzano)
