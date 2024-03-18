<?php
    class Role extends Controller{
        public $roleService;
        public function __construct(){
            $this->roleService = $this->service("RoleService");
        }
        public function CreateRole(){
            $this->roleService->createRole();
        }
        public function UpdateRole(){
            $this->roleService->updateRole();
        }
        public function DeleteRole(){
            $this->roleService->deleteRole();
        }
        public function GetAllRole(){
            $this->roleService->getAllRole();
        }
        public function GetRoleById(){
            $this->roleService->GetRoleById();
        }
    }
?>