<?php
/**
 * Mass Assign Extension for DataMapper classes.
 *
 * Assign an associative array to the field associated with some protection rules
 *
 * In the model must exist an array of rules for the fillable field and an array fot guarded field to not override
 * E.g.
 * class User extends DataMapper{
 *      //Field that can be filled
 *      public $guarded = ['name','email'];
 *      //Field that are not writable
 *      public $guarded = ['id','group'];
 * }
 * @license 	MIT License
 * @category	DMZ
 * @author  	Michele Somma
 * @version 	1.0
 */

/***
 * Class DMZ_Massassign
 */
class DMZ_Massassign {

    /***
     * @param $arrayValues array values to assign
     * @return mixed the object to save
     * @throws Exception no rules found
     */
    public function assign($object,$arrayValues){

        //check if there is at least 1 rule specified
        if (! isset($object->guarded) AND ! isset($object->fillable)){
            throw new Exception("Mass assigned fail: no guarded or fillable values specified");
        }

        //copy the array of values
        $assign = $arrayValues;

        //check if there is a fillable rules
        if( isset($object->fillable) && is_array($object->fillable)){
            $fillable = array_flip($object->fillable);
            //removes all the key except the fillable
            $assign = array_intersect_key($assign, $fillable);
        }

        //check if there is a guarded rules
        if( isset($object->guarded) && is_array($object->guarded)){
            $guarded = array_flip($object->guarded);
            //removes all the guarded field
            $assign = array_diff_key($assign, $guarded);
        }

        //if there is some to assign we assign it to the object
        if (count($assign)){
            foreach($assign as $k => $v){
                $object->$k = $v;
            }
        }

        return $object;

    }
}

/* End of file massassign.php */
/* Location: ./application/datamapper/massassign.php */

