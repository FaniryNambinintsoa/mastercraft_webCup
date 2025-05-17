<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

	/**
         * On liste les articles
         */
	public function index() {
            $this->load->helper(array('date', 'common'));
            
            $all_data = $this->article->get_data();
            foreach ($all_data as $data) {
                $this->load->view('vue_articles', $data);
            }
	}
        
        public function view($id) {
            $this->load->helper(array('date', 'common'));
            
            $this->article->article_id = $id;
            $this->article->load();
            
            $this->load->view('vue_articles', $this->article);
        }
        
        public function add() {
            $this->load->helper('form');
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules(
                    'article_name',
                    '"Titre de l\'article"',
                    'trim|required|min_length[3]|max_length[40]',
                    array(
                        'required' => 'Le nom de l\'article est requis'
                    )
            );
            
            $this->form_validation->set_rules(
                    'article_body',
                    '"Contenu de l\'article"',
                    'trim|required|min_length[40]|callback_validate_body'
            );
            
            $this->form_validation->set_error_delimiters('<div style="color:red;" >', '</div>');
            
            if ($this->form_validation->run()) {
                $this->article->article_name = $this->input->post('article_name');
                $this->article->article_body = $this->input->post('article_body');
                $this->article->save();
                
                $this->load->view('article_form_success');
            } else {
                $this->load->view('article_form');
            }
        }
        
        public function validate_body($input) {
            if (preg_match('/href/', $input)) {
                $this->form_validation->set_message('validate_body', 'Les liens ne sont pas autorisés');
                return FALSE;
            }
            return TRUE;
        }

        public function delete($id) {
            $this->article->article_id = $id;
            $this->article->delete();
        }
        
        public function calendar($id) {
            $this->article->article_id = $id;
            $this->article->load();
            
            $expl = explode('-', $this->article->article_modified);
            $data = array(
                $expl[2] => $this->config->base_url() . 'articles/view/' . $id
            );
            
            $this->load->library('calendar');
            
            echo $this->calendar->generate($expl[0], $expl[1], $data);
        }
}
