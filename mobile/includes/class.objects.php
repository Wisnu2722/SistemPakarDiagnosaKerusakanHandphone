<?PHP

 class User extends DBObject
    {
        public function __construct($id = null)
        {
            parent::__construct('users', array('username', 'password', 'nama_lengkap', 'email'), $id);
        }

        public function setPassword($password)
        {
            $Config = Config::getConfig();

            if($Config->useHashedPasswords === true)
                $this->password = sha1($password . $Config->authSalt);
            else
                $this->password = $password;
        }
        
    }

	class Kerusakan extends DBObject
		{
			public function __construct($id = null)
			{
				parent::__construct('kerusakan', array('id','jenis_kerusakan', 'pertanyaan_awal'), $id);
			}
		}
	
	class Pertanyaan extends DBObject
		{
			public function __construct($id = null)
			{
				parent::__construct('pertanyaan', array('id','pertanyaan', 'ya', 'tidak', 'id_kerusakan'), $id);
			}
		}
	
	class Solusi extends DBObject
		{
			public function __construct($id = null)
			{
				parent::__construct('solusi', array('id','solusi'), $id);
			}
		}
