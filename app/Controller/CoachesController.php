<?php
class CoachesController extends AppController{
    
    public $uses = ['Coach'];
    const COACHES_PHOTOS_DIR = WWW_ROOT . DS . 'img/coaches/';

    public function index(){
        $coachesList = $this->Coach->find('all');
        $this->set('coachesList', $coachesList);
        $this->render('index');
    }

    public function coachesList(){
        $coachesList = $this->Coach->find('all');
        $this->set('coachesList', $coachesList);
        $this->render('coaches_list');
    }

    public function addCoach(){
        if ($this->request->is('post')){
            $coach = [
                'surname' => trim(strip_tags($this->request->data('surname'))),
                'name' => trim(strip_tags($this->request->data('name'))),
                'last_name' => trim(strip_tags($this->request->data('last_name'))),
                'description' => trim(strip_tags($this->request->data('description'))),
            ];
            if (!empty($_FILES['photo']['name'])){
                $coachPhoto = $_FILES['photo']['name'];
                $coachPhoto = time() . '_coach' . substr($coachPhoto, strpos($coachPhoto, '.'), strlen($coachPhoto));
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $this::COACHES_PHOTOS_DIR .$coachPhoto)){
                    $coach['photo'] = $coachPhoto;
                }
            }
            else
                $coach['photo'] = 'default.png';
            if ($this->Coach->save($coach)){
                $this->Session->setFlash('Тренер успешно добавлен!', 'default', ['class' => 'alert alert-success']);
            }
            else{
                $this->Session->setFlash('При добавлении тренера произошла ошибка!', 'default', ['class' => 'alert alert-danger']);
            }
            $this->redirect('/admin/coaches/addCoach');
        }
        $this->render('add_coach');
    }

    public function editCoach(){
        $coachId = (int)$this->request->param('id');
        $oldCoach = $this->Coach->findById($coachId);
        if ($this->request->is('post')) {
            $coach = [
                'surname' => "'" . trim(strip_tags($this->request->data('surname'))) . "'",
                'name' => "'" . trim(strip_tags($this->request->data('name'))) . "'",
                'last_name' => "'" . trim(strip_tags($this->request->data('last_name'))) . "'",
                'description' => "'" . trim(strip_tags($this->request->data('description'))) . "'"
            ];
            if (!empty($_FILES['photo']['name'])) {
                unlink(self::COACHES_PHOTOS_DIR . $oldCoach['Coach']['photo']);
                $coachPhoto = $_FILES['photo']['name'];
                $coachPhoto = time() . '_coach' . substr($coachPhoto, strpos($coachPhoto, '.'), strlen($coachPhoto));
                if (move_uploaded_file($_FILES['photo']['tmp_name'], self::COACHES_PHOTOS_DIR . $coachPhoto)) {
                    $coach['photo'] = "'" . $coachPhoto . "'";
                }
            }
            if ($this->Coach->updateAll($coach, ['id' => $coachId])) {
                $this->Session->setFlash('Информация о трененре успешно изменена!', 'default', ['class' => 'alert alert-success']);
            } else {
                $this->Session->setFlash('При изменении информации про тренера произошла ошибка!', 'default', ['class' => 'alert alert-danger']);
            }
            $this->redirect('/admin/coaches/editCoach/' . $coachId);
        }
        $this->set('coach', $oldCoach['Coach']);
        $this->render('edit_coach');
    }

    public function deleteCoach(){
        $this->autoRender = false;
        $this->layout = null;
        $coachId = (int)$this->request->param('id');
        $coach = $this->Coach->findById($coachId);
        if (!empty($coach)){
            $coachPhoto = $coach['Coach']['photo'];
            if (!empty($coachPhoto) && file_exists($this::COACHES_PHOTOS_DIR . $coach['Coach']['photo'])
                && $coachPhoto != 'default.png')
                unlink(self::COACHES_PHOTOS_DIR . $coachPhoto);
            $this->Coach->delete($coachId);
        }
        $this->redirect('/admin/coaches');
    }
}