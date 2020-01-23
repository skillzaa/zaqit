<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class QuestionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "question"=> $this->question,
            "option1"=> $this->option1,
            "option2"=> $this->option2,
            "option3"=> $this->option3,
            "option4"=> $this->option4,
            "correctOption"=> $this->correctOption,
            "subject"=> $this->subject->name,
            "level"=> $this->level->name
        ];

    }
// public function with(){
//     return [
//         "aurther"=> "Bilal Tariq"
//     ];
// }
}
