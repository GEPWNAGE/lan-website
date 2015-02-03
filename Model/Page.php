<?php
class Page extends AppModel{

    public $virtualFields = array(
        'language-title' => "CONCAT(UPPER(IF(ISNULL(language),'nl',language)), ' - ', title)"
    );

    public $hasAndBelongsToMany = array(
        "Translation" => array(
            "className" => "Page",
            "joinTable" => "pages_translations",
            'associationForeignKey' => 'translation_id',
        )
    );

    /**
     * @param bool $created
     * @param array $options
     * @throws Exception
     */
    public function afterSave($created, $options = array()){

    }

    /**
     * Get all pages as a list for choosing an original
     * @param int $exclude_id
     * @return array|null
     */
    public function getOriginals($exclude_id = -1){
        $this->displayField = 'language-title';
        $originals = $this->find("list",
            array(
                "conditions" => array(
                    "Page.id !=" => $exclude_id
                ),
                "order" => array("Page.language", "Page.title")
            )
        );
        return $originals;
    }

    public function saveReverseTranslation($data){
        if(isset($data['Translation'][0]) && $data['Translation'][0]['id'] != ""){
            $this->save(
                array(
                    'Page' => array(
                        "id" => $data['Translation'][0]['id']
                    ),
                    'Translation' => array(
                        array("id" => $data['Page']['id'])
                    )
                ),
                array(
                    "callbacks" => false,
                    "fieldlist" => array("Page.id", "Translation.id")
                )
            );
        }
    }
}