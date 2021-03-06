<?php


declare(strict_types=1);

class BankAccount
{
    private int $balance;

    public function __construct(int $balance)
    {
        if ($balance < 0) {
            $this->balance = 0;
            echo 'Balance cannot be less than 0';

            return;
        }
        $this->balance = $balance;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function spend(int $amount)
    {
        if ($amount > $this->balance) {
            echo 'Cannot spend more than you have';

            return;
        }

        $this->balance = $this->balance - $amount;
    }

    public function deposit(int $amount)
    {
        $amount = $this->applyFees($amount);

        if ($amount > 0) {
            $this->balance = $this->balance + $amount;
        }

        return $this;
    }

    protected function applyFees(int $amount)
    {
        return round($amount - $amount * 0.01);
    }
}

/*
Sukurkite papildomas klases, kurios paveldėtų klasę BankAccount:
- klasė StudentAccount - Ši klasė turi netaikyti jokių mokesčių depozitams.
- klasė ChildAccount - Ši klasė neturi leisti per vieną kartą išleisti daugiau nei 10eur.
- klasė CreditAccount - Ši klasė neturi turi leisti balansui nukristi iki -X sumos ($maxCreditAmount).
T.y. balansas gali buti neigiamas
Ši suma ($maxCreditAmount) turi būti paduodama per konstruktorių.
- klasė SavingsAccount. Ši klasė turi suteikti galimybę padidinti sąskaitos depozitą tam tikru procentu.
T.y. - ji gali turėti public metodą addInterest, kurį iškvietus su X procentu, depozitas padidėtų X procentų
Įsivaizduokite, kad šis metodas būtų kviečiamas kas metus ir sąskaita tokiu būdu augtų.
*/