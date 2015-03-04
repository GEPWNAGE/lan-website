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

	public $actsAs = array(
		'Serializable.Serializable' => array(
			'fields' => array("info")
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
     * @param array $results
     * @param bool $primary
     */
    public function afterFind($results, $primary = false){
        foreach ($results as $key => &$val) {
            if (isset($val['Page']['content'])) {
                if(Router::getParam('prefix', true) != 'admin'){
                    $val['Page']['content'] = $this->replaceShortCodes($val['Page']['content']);
                }
            }
        }
        return $results;
    }

    private function replaceShortcodes($content){
        preg_match('/\[\S+\]/', $content, $matches);
        foreach($matches as $match){
            $codename = str_replace(array("[", "]"), "", $match);
            switch($codename){
                case "participants":
                    $content = str_replace($match, $this->requestAction(array("controller" => "participants", "action" => "listing", "admin" => false), array("return")), $content);
                    break;
                default:
                    break;
            }
        }
        return $content;
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
        if(isset($data['Translation']['id']) && $data['Translation']['id'] != ""){
            $this->save(
                array(
                    'Page' => array(
                        "id" => $data['Translation']['id']
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