<a id="extension"></a>
# plg\_system\_gbj
Joomla! system plugin for loading and registering custom library **lib_gbj** right after initializing the plugin.
The plugin checks whether the library is installed and enabled. Without it its installation fails and ends with error message.


<a id="dependency"></a>
## Dependency
- **lib_gbj**: Custom library for custom extensions.


<a id="package"></a>
## Installation Package
The plugin's installation package has the following structure:

    plg_system_gbj
    ├── language
    │   ├── en-GB
    │   │   ├── en-GB.plg_system_gbj.ini
    │   │   └── en-GB.plg_system_gbj.sys.ini
    │   └── sk-SK
    │       ├── sk-SK.plg_system_gbj.ini
    │       └── sk-SK.plg_system_gbj.sys.ini
    ├── gbj.php
    ├── gbj.xml
    ├── gbj.script.php
    └── LICENSE.txt


<a id="site"></a>
## Joomla Site
After installation the plugin is spread in the Joomla site by the following structure:

    joomlasite
    ├── administrator
    │   └── language
    │       ├── en-GB
    │       │   ├── en-GB.plg_system_gbj.ini
    │       │   └── en-GB.plg_system_gbj.sys.ini
    │       └── sk-SK
    │           ├── sk-SK.plg_system_gbj.ini
    │           └── sk-SK.plg_system_gbj.sys.ini
    └── plugins
        └── system
            └── gbj
                ├── gbj.php
                ├── gbj.xml
                ├── gbj.script.php
                └── LICENSE.txt


<a id="files"></a>
## Files
The plugin consists of following files:

- **gbj.xml**: The manifest of the plugin. 
- **gbj.php**: The main class file of the plugin defining its class *PlgSystemGbj*.
- **gbj.script.php**: The installation class file of the plugin defining its class *PlgSystemGbjInstallerScript*, which method *preflight* checks right before the installation of the plugin itself whether the loadign [library](#dependency) is installed and enabled.  
- **en-GB.plg\_system\_gbj.ini**: Language file in English for plugin interaction with a user. Because the plugin does not interact with any user, the file contains just the name and description of the plugin.  
- **en-GB.plg\_system\_gbj.sys.ini**: Language file in English with name and description for Joomla installer and extension manager as well as with installation error messages. 
- **sk-SK.plg\_system\_gbj.ini**: Language file in Slovak for plugin interaction with a user.  
- **sk-SK.plg\_system\_gbj.sys.ini**: Language file in Slovak with name and description for Joomla installer and extension manager as well as with installation error messages.


<a id="interface"></a>
## Classes and their Interfaces

### PlgSystemGbj
The class is the main plugin's definition class, which contains methods acting as triggers in the Joomla site. It is defined in the file **gbj.php**.
 
- [onAfterInitialise()](#onAfterInitialise)


### PlgSystemGbjInstallerScript
The class is the plugin's installation class, which contains methods running at particular installation actions like install, update, discovery, etc. It is defined in the file **gbj.script.php**.
 
- [preflight()](#preflight)
- [install()](#install)


<a id="onAfterInitialise"></a>
## PlgSystemGbj::onAfterInitialise()
#### Description
The method registers and loads custom library **lib_gbj alongside with its language files**, so that the library and its language constants are available for any extension in the Joomla site, which that library references.

#### Syntax
    public function onAfterInitialise()

#### Parameters
None

#### Returns
None

[Back to interface](#interface)


<a id="preflight"></a>
## PlgSystemGbjInstallerScript::preflight()
#### Description
The method checks whether the custom library **lib_gbj** is installed and enabled. If it is not, the Joomla installer breaks installatin of the plugin and queues the corresponding installation error message informing about this. 

#### Syntax
	public function preflight($route, JAdapterInstance $adapter)

#### Parameters
- **route**: Type of installation action that runs this method.
  - *Valid values*: enumerated string ('install' | 'uninstall' | 'discover_install')
  - *Default value*: none

- **adapter**: The object running this method usually the Joomla installer.
  - *Valid values*: JAdapterInstance object
  - *Default value*: none

#### Returns
Boolean result of library checking. In case of *false* result the installation is broken and installer displays the error message defined in the method.

[Back to interface](#interface)


<a id="install"></a>
## PlgSystemGbjInstallerScript::install()
#### Description
The method enables the plugin right after its installation. It does not change the status of the plugin at updating the plugin. 

#### Syntax
	public function install($JAdapterInstance $adapter)

#### Parameters
- **adapter**: The object running this method usually the Joomla installer.
  - *Valid values*: JAdapterInstance object
  - *Default value*: none

#### Returns
None

[Back to interface](#interface)
