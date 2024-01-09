public function add_periodic(){
        $manager = $this->db->query("SELECT *  FROM  periodic where roles=2 ");
        $data['manager']=$manager->getResultArray();

        return view('admin/add_periodic',$data);
    }

    public function save_periodic(){
        $password=$this->request->getPost('password_user');
        $evaluator=$this->request->getPost('evaluator_id');
        if($evaluator==0){
            $evaluator=null;
        }
            $data=[
                'username'=>$this->request->getVar('username'),
                'password_user'=>password_hash($password,PASSWORD_BCRYPT),
                'name_user'=>$this->request->getVar('name_user'),
                'job_title'=>$this->request->getVar('job_title'),
                'address'=>$this->request->getVar('address'),
                'gender'=>$this->request->getVar('gender'),
                'no_telp'=>$this->request->getVar('no_telp'),
                'roles'=>$this->request->getVar('roles'),
                'evaluator_id'=>$evaluator,


            ];
            $this->db->table('periodic')->insert($data);
        

        /*
        $data = $this->request->getPost();
        $this->db->table('periodic')->insert($data);
        */

        if($this->db->affectedRows() >0){
            return redirect()->to(site_url('admin/periodic_db'))->with('success','data saved success');
        }
    }

    public function edit_periodic($id=null){
        if($id!=null){
            $query=$this->db->table('periodic')->getWhere(['users_id'=>$id]);
            if($query->resultID->num_rows > 0 ){
                $manager = $this->db->query("SELECT *  FROM  periodic where roles=2 ");
                $data['manager']=$manager->getResultArray();

                $data['user']=$query->getRow();
                return view('admin/edit_periodic', $data);
            }else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            
        }else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    public function update_periodic($id){
        $password=$this->request->getPost('password_user');
        $evaluator=$this->request->getPost('evaluator_id');
        if($evaluator==0){
            $evaluator=null;
        }
            $data=[
                'username'=>$this->request->getVar('username'),
                'password_user'=>password_hash($password,PASSWORD_BCRYPT),
                'name_user'=>$this->request->getVar('name_user'),
                'job_title'=>$this->request->getVar('job_title'),
                'address'=>$this->request->getVar('address'),
                'gender'=>$this->request->getVar('gender'),
                'no_telp'=>$this->request->getVar('no_telp'),
                'roles'=>$this->request->getVar('roles'),
                'evaluator_id'=>$evaluator,


            ];
            $this->db->table('periodic')->where(['users_id'=>$id])->update($data);
        
       /* $data = $this->request->getPost();
        unset($data['_method']);
        $this->db->table('periodic')->where(['users_id'=>$id])->update($data);      
        */
        return redirect()->to(site_url('admin/periodic_db'))->with('success','data updated successfully');
    }

    public function delete_periodic($id){

        $this->db->table('periodic')->where(['users_id'=>$id])->delete();

        return redirect()->to(site_url('admin/periodic_db'))->with('success','data deleted successfully');
    }