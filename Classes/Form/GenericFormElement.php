<?php
declare(strict_types=1);

namespace Form;

abstract class GenericFormElement implements InputRenderInterface
{
    protected string $type;

    protected string $name;

    protected int $id;

    protected string $question;

    protected array $answer;

    protected string $correct;

    protected string $score;

    protected bool $required = false;
    
    protected mixed $value = '';

    public function __construct(
        
        string $name,
        int $id,
        string $question,
        array $answer,
        string $correct,
        string $score,
        string $defaultValue = '',
        $required = false

    )
    {
        /**permet de construire un element de formulaire */
        $this->name = $name;
        $this->id = $id;
        $this->question = $question;
        $this->answer = $answer;
        $this->correct = $correct;
        $this->score = $score;
        $this->required = $required;
        $this->value = $defaultValue;
    }

    public function __toString(): string
    {
        
        return $this->render();
    }

    public function getType(): string {
        /**donne le type de l'element */
        return $this->type;
    }

    function getName(): string 
    {
        /**donne le nom de l'element  */
        return $this->name;
    }

    public function setType(string $type): void {
        /**permet de changer le type de l'element  */
        $this->type = $type;
    }

    public function getId(): int {
        /**donne l'id de l'element  */
        return $this->id;
    }

    public function setId(int $id): void {
        /**permet de changer l'id de l'element  */
        $this->id = $id;
    }

    public function getQuestion(): string {
        /**donne la question de l'element  */
        return $this->question;
    }

    public function setQuestion(string $question): void {
        /**permet de changer la question de l'element  */
        $this->question = $question;
    }

    public function getAnswer(): array {
        /**donne la réponse de l'element  */
        return $this->answer;
    }

    public function setAnswer(array $answer): void {
        /**permet de changer la reponse de l'element  */
        $this->answer = $answer;
    }

    public function getCorrect(): string {
     
        return $this->correct;
    }

    public function setCorrect(string $correct): void {
        $this->correct = $correct;
    }

    public function getScore(): string {
        /**donne le score de l'element  */
        return $this->score;
    }

    public function setScore(string $score): void {
        /**permet de changer le score de l'element  */
        $this->score = $score;
    }

    function getValue(): array|string 
    {
        return $this->value;
    }

    function isRequired(): bool
    {
        /**donne si l'element est necessaire de l'element  */
        return $this->required;
    }

}