<?php

class UserManager extends Model
{

  public function getInfos($user_id)
  {
    return $this->getUserInfo($user_id);
  }

  public function getAllUsersInfo()
  {
    return $this->getAllUsersInfos();
  }

  public function updateUser($email, $nom, $prenom, $password, $id)
  {
    return $this->updateUserInfos($email, $nom, $prenom, $password, $id);
  }

  public function deleteAUser($id)
  {
    return $this->eraseUser($id);
  }
}
