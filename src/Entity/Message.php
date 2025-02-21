<?php

// namespace App\Entity;

// use Doctrine\ORM\Mapping as ORM;
// use App\Repository\MessageRepository;
// use Symfony\Component\Validator\Constraints as Assert;

// #[ORM\Entity(repositoryClass: MessageRepository::class)]
// class Message
// {
//     #[ORM\Id]
//     #[ORM\GeneratedValue]
//     #[ORM\Column(type: 'integer')]
//     private ?int $id = null;

//     #[ORM\Column(type:'string', length:100)]
//     #[Assert\NotBlank(message: "L'email est obligatoire.")]
//     #[Assert\Length(max: 100, maxMessage: "L'email ne peut pas dépasser 100 caractères.")]
//     #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide.")]
//     private ?string $email = null;

//     #[ORM\Column(type:'string', length:50)]
//     #[Assert\NotBlank(message: "Le nom de l'expéditeur est obligatoire.")]
//     #[Assert\Length(max: 50, maxMessage: "Le nom de l'expéditeur ne peut pas dépasser 50 caractères.")]
//     private ?string $messageSender = null;

//     #[ORM\Column(type:'string', length:20)]
//     #[Assert\NotBlank(message: "Le numéro de l'expéditeur est obligatoire.")]
//     #[Assert\Length(max: 20, maxMessage: "Le numéro de l'expéditeur ne peut pas dépasser 20 caractères.")]
//     #[Assert\Regex(
//         pattern: "/^\+?[0-9\s\-]{7,20}$/",
//         message: "Le numéro de téléphone doit être valide."
//     )]
//     private ?string $phoneNumber = null;

//     #[ORM\Column(type:'string', length:255)]
//     #[Assert\NotBlank(message: "L'objet du message est obligatoire.")]
//     #[Assert\Length(max: 255, maxMessage: "L'objet du message ne peut pas dépasser 255 caractères.")]
//     private ?string $subject = null;

//     #[ORM\Column(type:'text')]
//     #[Assert\NotBlank(message: "Le message est obligatoire.")]
//     private ?string $message = null;

//     #[ORM\Column(type: 'datetime_immutable')]
//     private ?\DateTimeImmutable $date = null;

//     public function __construct()
//     {
//         $this->date = new \DateTimeImmutable();
//     }

//     public function getId(): ?int
//     {
//         return $this->id;
//     }

//     public function getEmail(): ?string
//     {
//         return $this->email;
//     }

//     public function setEmail(string $email): self
//     {
//         $this->email = $email;
//         return $this;
//     }

//     public function getMessageSender(): ?string
//     {
//         return $this->messageSender;
//     }

//     public function setMessageSender(string $messageSender): self
//     {
//         $this->messageSender = $messageSender;
//         return $this;
//     }

//     public function getPhoneNumber(): ?string
//     {
//         return $this->phoneNumber;
//     }

//     public function setPhoneNumber(string $phoneNumber): self
//     {
//         $this->phoneNumber = $phoneNumber;
//         return $this;
//     }

//     public function getMessage(): ?string
//     {
//         return $this->message;
//     }

//     public function setMessage(string $message): self
//     {
//         $this->message = $message;
//         return $this;
//     }

//     public function getDate(): ?\DateTimeImmutable
//     {
//         return $this->date;
//     }

//     public function setDate(\DateTimeImmutable $date): self
//     {
//         $this->date = $date;
//         return $this;
//     }

//     public function getSubject(): ?string
//     {
//         return $this->subject;
//     }

//     public function setSubject(string $subject): self
//     {
//         $this->subject = $subject;
//         return $this;
//     }
// }
