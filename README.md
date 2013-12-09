dmz_massassign
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

Copy the class massassign in your extensions of datamapper folder generally in `applicazion/datamapper/`. Then load the extension properly following the datamapper guide.

