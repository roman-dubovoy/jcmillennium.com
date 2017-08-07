<?php
class AthletesController extends AppController{

    public $uses = ['Athlete'];
    public $components = ['Session', 'Cookie', 'RequestHandler'];
    public $helpers = ['Session'];
    const ATHLETES_PHOTOS_DIR = '/img/athletes/';

    public function index(){
        $athletesList = $this->Athlete->find('all');
        $this->set('athletesList', $athletesList);
    }

    public function athletesList(){
        $athletesList = $this->Athlete->find('all');
        $this->set('athletesList', $athletesList);
    }

    public function addAthlete(){
        if ($this->request->is('post')){
            $athlete = [
                'surname' => trim(strip_tags($this->request->data('surname'))),
                'name' => trim(strip_tags($this->request->data('name'))),
                'description' => trim(strip_tags($this->request->data('description')))
            ];
            if (!empty($_FILES['photo']['name'])){
                $athletePhoto = $_FILES['photo']['name'];
                $athletePhoto = time() . '_athlete' . substr($athletePhoto, strpos($athletePhoto, '.'), strlen($athletePhoto));
                if (move_uploaded_file($_FILES['photo']['tmp_name'], self::ATHLETES_PHOTOS_DIR .$athletePhoto)){
                    $athlete['photo'] = $athletePhoto;
                }
            }
            else
                $athlete['photo'] = 'default.png';
            if ($this->Athlete->save($athlete)){
                $this->Session->setFlash('Спортсмен успешно добавлен!', 'default', ['class' => 'alert alert-success']);
            }
            else{
                $this->Session->setFlash('При добавлении спортсмена произошла ошибка!', 'default', ['class' => 'alert alert-danger']);
            }
            $this->redirect('/admin/athletes/addAthlete');
        }
        $this->render('add_athlete');
    }

    public function editAthlete(){
        $athleteId = (int)$this->request->param('id');
        $oldAthlete = $this->Athlete->findById($athleteId);
        if ($this->request->is('post')){
            $athlete = [
                'surname' => "'" . trim(strip_tags($this->request->data('surname'))) . "'",
                'name' => "'" . trim(strip_tags($this->request->data('name'))) . "'",
                'description' => "'" . trim(strip_tags($this->request->data('description'))) . "'"
            ];
            if (!empty($_FILES['photo']['name'])) {
                unlink(self::ATHLETES_PHOTOS_DIR . $oldAthlete['Athlete']['photo']);
                $athletePhoto = $_FILES['photo']['name'];
                $athletePhoto = time() . '_coach' . substr($athletePhoto, strpos($athletePhoto, '.'), strlen($athletePhoto));
                if (move_uploaded_file($_FILES['photo']['tmp_name'], self::ATHLETES_PHOTOS_DIR . $athletePhoto)) {
                    $athlete['photo'] = "'" . $athletePhoto . "'";
                }
            }
            if ($this->Athlete->updateAll($athlete, ['id' => $athleteId])) {
                $this->Session->setFlash('Информация о спортсмене успешно изменена!', 'default', ['class' => 'alert alert-success']);
            } else {
                $this->Session->setFlash('При изменении информации о спортсмене произошла ошибка!', 'default', ['class' => 'alert alert-danger']);
            }
            $this->redirect('/admin/athletes/editAthlete/' . $athleteId);
        }
        $this->set('athlete', $oldAthlete['Athlete']);
        $this->render('edit_athlete');
    }

    public function deleteAthlete(){
        $this->autoRender = false;
        $this->layout = null;
        $athleteId = (int)$this->request->param('id');
        $athlete = $this->Athlete->findById($athleteId);
        if (!empty($athlete)){
            $athletePhoto = $athlete['Athlete']['photo'];
            if (!empty($athletePhoto) && file_exists(self::ATHLETES_PHOTOS_DIR . $athlete['Athlete']['photo'])
                && $athletePhoto != 'default.png')
                unlink($this::ATHLETES_PHOTOS_DIR . $athletePhoto);
            $this->Athlete->delete($athleteId);
        }
        $this->redirect('/admin/athletes');
    }
}