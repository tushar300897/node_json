<?php

namespace Drupal\node_json_data\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
class ModuleConfigurationForm extends ConfigFormBase {
	public function getFormId() {
    return 'node_json_dataform';
  }	
   protected function getEditableConfigNames() {
    return [
      'node_json_data.settings',
    ];
  }
   public function buildForm(array $form, FormStateInterface $form_state) {
   	 $config = $this->config('node_json_data.settings');
   $form['api_key'] = [
	  '#title' =>  $this->t('Enter API Key'),
	  '#type' => 'textfield',
	  
	  '#max' => '10',
	  
  ];

 
    return parent::buildForm($form, $form_state);
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    }
  public function submitForm(array &$form,FormStateInterface $form_state){
  	 $value = $form_state->getValue('api_key');
  	 $this->config('node_json_data.settings')
      ->set('variable_name', $value)
      ->save();
    parent::submitForm($form, $form_state);
  	}
  }