<?php
    class ImportReturnDetailRepository extends DB{
        public function createImportReturnDetail($importReturnDetail){
            $this->create("import_return_details", $importReturnDetail);
        }

        public function updateImportReturnDetail($importReturnDetail, $id){// by id
            $this->update("import_return_details", $importReturnDetail, "import_return_detail_id = ".$id);
        }

        public function deleteImportReturnDetail($id){// by id
            $this->realDelete("import_return_details", "import_return_detail_id = ".$id);
        }

        public function getAllImportReturnDetail(){
            return $this->readDontHaveIsActive("import_return_details");
        }
        
        public function getImportReturnDetailById($id){
            return $this->getAllDontHaveIsActive("import_return_details", "import_return_detail_id = ".$id);
        }
    }
?>