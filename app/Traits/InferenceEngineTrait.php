<?php

namespace App\Traits;


trait InferenceEngineTraits
{



    public function knowledgeBase($requirement, &$knownfact, &$generatedFact)
    {
        $distance = $requirement->distance;
        $senior_citizen = $requirement->senior_citizen;
        $disable = $requirement->disable;


        //distance
        if ($distance <= "1.00") {
            $generatedFact = "Walkin Queue";

            $knownfact["1.00"] = "distance";


            //senior_citizen
            if ($senior_citizen == "Yes") {
                $knownfact["Yes"] = "senior_citizen";
            }
            if ($senior_citizen == "No") {
                $knownfact["No"] = "senior_citizen";
            }



            //disable
            if ($disable == "Yes") {
                $knownfact["Yes"] = "disable";
            }
            if ($disable == "No") {
                $knownfact["No"] = "disable";
            }
        }

        else if ($distance > "1.00"){
            $generatedFact = "Home Queue";

            $knownfact["1.00"] = "distance";
        }
    }

    public function workingMemory($fact, &$knownfact)
    {
        $PlanDetail = [];

        //rule1

        if (array_key_exists("Male", $knownfact)) {
            if (array_key_exists("1", $knownfact)) {
                if (array_key_exists("Monthly", $knownfact)) {
                    if (array_key_exists("TT201", $knownfact)) {
                        if (array_key_exists("20", $knownfact)) {
                            if (array_key_exists("50-99", $knownfact)) {


                                $PlanDetail = [
                                    "PlanId" => "TT201",
                                    "PlanName" => "TAKAFUL TERM 80",
                                    "ContTerm" => "20 years",
                                    "PlanNo" => "2",
                                    "BenefitDeath" => "RM150,000 ",
                                    "CriticalIllness" => "RM150,000",
                                    "AccidentialDeath" => "RM150,000",
                                    "HospitalBenefit" => "RM70.00 ",
                                    "TotalMonthlyContribution" => "RM142.57",
                                    "TotalAnuallyRegularContribution" => "RM1584.00"
                                ];
                            }
                        }
                    }
                }
            }
        }
        //rule2
        if (array_key_exists("Male", $knownfact)) {
            if (array_key_exists("1", $knownfact)) {
                if (array_key_exists("Monthly", $knownfact)) {
                    if (array_key_exists("TT201", $knownfact)) {
                        if (array_key_exists("20", $knownfact)) {
                            if (array_key_exists("100-199", $knownfact)) {

                                $PlanDetail = [
                                    "PlanId" => "TT201",
                                    "PlanName" => "TAKAFUL TERM 80",
                                    "ContTerm" => "20 years",
                                    "PlanNo" => "2",
                                    "BenefitDeath" => "RM150,000 ",
                                    "CriticalIllness" => "RM150,000",
                                    "AccidentialDeath" => "RM150,000",
                                    "HospitalBenefit" => "RM70.00 ",
                                    "TotalMonthlyContribution" => "RM142.57",
                                    "TotalAnuallyRegularContribution" => "RM1584.00"
                                ];
                            }
                        }
                    }
                }
            }
        }








        return $PlanDetail;
    }

    public function inferenceEngine($requirement)
    {
        $knownfact = array();
        $this->knowledgeBase($requirement, $knownfact, $generatedFact);

        $selectedPlan = $this->workingMemory($requirement, $knownfact, $generatedFact);
        return $selectedPlan;
    }
}
