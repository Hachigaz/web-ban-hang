<?php
    class RoleRepository extends DB{
        public function createRole($role){
            $this->create("roles", $role);
        }

        public function updateRole($role, $id){// by id
            $this->update("roles", $role, "role_id = ".$id);
        }

        public function deleteRole($id){// by id
            $this->delete("roles", "role_id = ".$id);
        }

        public function getAllRole(){
            return $this->read("roles");
        }
        
        public function getRoleById($id){
            return $this->getAllByWhere("roles", "role_id = ".$id);
        }
    }
?>