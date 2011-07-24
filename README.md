
### About

This Lithium plugin provides additional g11n resources. These intentionally haven't been bundled with the Lithium core to allow the community to extend and add to the resources collaboratively. The specialized nature of the resources as well as the sheer size have been another reason for not shipping the data with the core.

Following resources are currently contained in this plugin:

 * Plural rules for the most common languages. (`resources/g11n/<LOCALE>/message/default.php`)
 * Validation rules. (`resources/g11n/<LOCALE>/validation/default.php`)

### Installation

Just install and register the plugin into your application as per [the manual](http://lithify.me/docs/manual). Resources contained within this plugin are automatically registered with the `Catalog` class while maintaining existing configurations. This makes the resources available to thee application this plugin is contained in. `Message::translate()` calls will utilize these resources automatically as long as no or the `li3_lldr` named configuration is selected.

 
