<?php
    class ExportRepository extends DB{
        public function createExport($export){
            $this->create("exports", $export);
        }

        public function updateExport($export, $id){// by id
            $this->update("exports", $export, "export_id = ".$id);
        }

        public function deleteExport($id){// by id
            $this->delete("exports", "export_id = ".$id);
        }

        public function getAllExport(){
            return $this->read("exports");
        }
        
        public function getExportById($id){
            return $this->getAllByWhere("exports", "export_id = ".$id);
        }
    }
?>