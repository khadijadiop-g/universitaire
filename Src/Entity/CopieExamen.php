<?php

class CopieExamen extends AbstractDocument
{
    private int $noteBrute;
    private ?int $noteFinale;
    private bool $penaliteAppliquee;
    private \DateTime $dateLimite;

    public function __construct(
        ?int $id,
        \DateTime $dateDepot,
        int $noteBrute,
        ?int $noteFinale,
        bool $penaliteAppliquee,
        \DateTime $dateLimite
    ) {
        parent::__construct($dateDepot,$id);

        $this->noteBrute = $this->validateNote($noteBrute);
    }

    private function validateNote(?int $note): ?int
    {
        if ($note < 0 || $note > 20) {
            throw new \Exception(" doit être comprise entre 0 et 20");
        }

        return $note;
    }
    public function calculerNoteFinale(float $noteFinale): void {
        if ($this->penaliteAppliquee) {
            $this->noteFinale = max(0, $this->noteBrute - 2);
        } else {
            $this->noteFinale = $this->noteBrute;
        }
    }

}