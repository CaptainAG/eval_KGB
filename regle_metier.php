<?php 

function contactsAreValid()
{
    $dataCountry = $this->pays;
    $dataContacts = $this->contact;

    foreach ($dataContacts as $contact) {
        if ($dataCountry != $contact->getNationalite()) {
            return false;
        }
    }
    return true;
}
 
function planqueIsValid()
{
    $dataCountry = $this->pays;
    $dataPlanque = $this->planque;

    if ($dataCountry != $dataPlanque) {
        return false;
    }
    return true;
}

 function specialiteAreValid()
{
    $dataSpecialites = $this->specialite;
    $dataAgents = $this->agent;

    $validSpecialiteAgents = 0;

    foreach ($dataAgents as $agent) {
        $agentSpecialite = $agent->getSpecialite();
        if (in_array($dataSpecialites->getSpecialite(), $agentSpecialite)) {
            $validSpecialiteAgents += 1;
        }
        if ($validSpecialiteAgents == 0) {
            return false;
        }
    }
    return true;
}

 function nationaliteAreValid()
{
    $dataAgents = $this->agent;
    $dataCibles = $this->cible;

    foreach ($dataAgents as $agent) {
        foreach ($dataCibles as $cible) {
            if ($agent->getNationalite() == $cible->getNationalite()) {
                return false;
            }
        }
    }
    return true;
}

function missionIsValid()
{

    if (!$this->contactsAreValid() || !$this->planqueIsValid() || !$this->specialiteAreValid() || !$this->nationaliteAreValid()) {
        return false;
    }
    return true;
}
