<?php


class Transfer extends Person{
    private int $equipe_depart_id;
    private int $equipe_arrive_id;
    private float $montant;
    private string $status;

    public function __construct(int $id,int $equipe_depart_id,int $equipe_arrive_id,float $montant,string $status)
    {
    }


}


?>