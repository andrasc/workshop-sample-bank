<?php

class RequestValidatorModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function checkUserEmail($email)
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where('users.Email', $email)
            ->get()
            ->row_array();

        return $result;
    }

    /**
     * @param $token
     * @param $email
     * @return mixed
     */
    public function checkUserToken($token, $email)
    {
        $result = $this->db->select('*')
            ->from('client_tokens')
            ->join('users', 'users.IdUser = client_tokens.IdUser')
            ->where(['client_tokens.ClientToken' => $token, 'users.Email' => $email])
            ->get()
            ->row_array();

        return $result;
    }
}
