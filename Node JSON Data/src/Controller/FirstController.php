<?php
namespace Drupal\node_json_data\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;


class FirstController extends ControllerBase{
	public function content($apikey,$nodeid){
		$config = \Drupal::config('node_json_data.settings');
        $apivalue=$config->get('variable_name');
        if($apivalue==$apikey){
        $values = \Drupal::entityQuery('node')->condition('nid', $nodeid)->execute();
        if(in_array($nodeid, $values))
        { $node=Node::load($nodeid);
          $nodeData=$node->toArray();
          return new JsonResponse($nodeData);
           }
       }
        else{
        	print_r("error");
        }
        return [
			'#type' => 'markup',
			'#markup' => $this->t('this is my controller'),
		];
	}
}
	
