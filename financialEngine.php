<?php

final class FinancialEngine {
    private float $commission;
    private float $solvabilite;
    private float $totalcost;

    static private float $transferTax = 0.05;
    static private float $commissionRate = 0.10;

    public function CheckSolvabilite(float $budget, float $transferAmount){
        $this->commission = $transferAmount * self::$commissionRate;
        $this->totalcost = $transferAmount + $this->commission + ($transferAmount * self::$transferTax);
        $this->solvabilite = $budget - $this->totalcost;

        if($this->solvabilite >= 0){
            return $this->totalcost;
        }else{
            return false;
        }
        
    }
}

?>