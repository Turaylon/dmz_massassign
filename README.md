DMZ Datamapper Extension MassAssign
==============

DMZ Datamapper Extension for mass assignment

 Assign an associative array to the field associated with some protection rules
 
 In the model must exist an array of rules for the fillable field and an array for guarded field to not override
 
Example:
 ```
 class User extends DataMapper{
      //Field that can be filled
      public $guarded = ['name','email'];
      //Field that are not writable
      public $guarded = ['id','group'];
  }
  ```
  Then use it on an object:
  
  `$user->assign($input)->save();`
  
  


Default Installation
==============

Copy the class massassign in your extensions of datamapper folder generally in `applicazion/datamapper/`. Then load the extension properly following the [datamapper guide](http://datamapper.wanwizard.eu/pages/extensions.html).


About Datamapper
================

DataMapper is an Object Relational Mapper written in PHP for CodeIgniter. It is designed to map your Database tables into easy to work with objects, fully aware of the relationships between each other. [Click here for more information on the official site](http://datamapper.wanwizard.eu/).

