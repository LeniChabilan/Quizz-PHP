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
        return $this->type;
    }

    function getName(): string 
    {
        return $this->name;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getQuestion(): string {
        return $this->question;
    }

    public function setQuestion(string $question): void {
        $this->question = $question;
    }

    public function getAnswer(): array {
        return $this->answer;
    }

    public function setAnswer(array $answer): void {
        $this->answer = $answer;
    }

    public function getCorrect(): string {
        return $this->correct;
    }

    public function setCorrect(string $correct): void {
        $this->correct = $correct;
    }

    public function getScore(): string {
        return $this->score;
    }

    public function setScore(string $score): void {
        $this->score = $score;
    }

    function getValue(): array|string 
    {
        return $this->value;
    }

    function isRequired(): bool
    {
        return $this->required;
    }

}