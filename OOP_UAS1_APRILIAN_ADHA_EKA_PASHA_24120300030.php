<?php

// Base Person class
class Person {
    protected $id;
    protected $name;
    protected $age;
    protected $address;
    protected $phoneNumber;
    
    public function __construct($id, $name, $age, $address, $phoneNumber) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
    }
    
    // Getters
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }
    
    // Setters
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setAge($age) {
        $this->age = $age;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }
    
    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }
    
    public function getInfo() {
        return "ID: {$this->id}, Name: {$this->name}, Age: {$this->age}, Address: {$this->address}, Phone: {$this->phoneNumber}";
    }
}

// Coach class - inherits from Person
class Coach extends Person {
    private $license;
    private $experience;
    private $coachType; // "Head Coach" or "Assistant Coach"
    
    public function __construct($id, $name, $age, $address, $phoneNumber, $license, $experience, $coachType) {
        parent::__construct($id, $name, $age, $address, $phoneNumber);
        $this->license = $license;
        $this->experience = $experience;
        $this->coachType = $coachType;
    }
    
    public function getLicense() {
        return $this->license;
    }
    
    public function getExperience() {
        return $this->experience;
    }
    
    public function getCoachType() {
        return $this->coachType;
    }
    
    public function setLicense($license) {
        $this->license = $license;
    }
    
    public function setExperience($experience) {
        $this->experience = $experience;
    }
    
    public function setCoachType($coachType) {
        $this->coachType = $coachType;
    }
    
    public function getInfo() {
        return parent::getInfo() . ", License: {$this->license}, Experience: {$this->experience} years, Type: {$this->coachType}";
    }
    
    public function trainTeam() {
        return "{$this->name} is training the team.";
    }
}

// Player class - inherits from Person
class Player extends Person {
    private $position;
    private $jerseyNumber;
    private $studentId;
    private $goals;
    private $assists;
    
    public function __construct($id, $name, $age, $address, $phoneNumber, $position, $jerseyNumber, $studentId) {
        parent::__construct($id, $name, $age, $address, $phoneNumber);
        $this->position = $position;
        $this->jerseyNumber = $jerseyNumber;
        $this->studentId = $studentId;
        $this->goals = 0;
        $this->assists = 0;
    }
    
    public function getPosition() {
        return $this->position;
    }
    
    public function getJerseyNumber() {
        return $this->jerseyNumber;
    }
    
    public function getStudentId() {
        return $this->studentId;
    }
    
    public function getGoals() {
        return $this->goals;
    }
    
    public function getAssists() {
        return $this->assists;
    }
    
    public function setPosition($position) {
        $this->position = $position;
    }
    
    public function setJerseyNumber($jerseyNumber) {
        $this->jerseyNumber = $jerseyNumber;
    }
    
    public function addGoal() {
        $this->goals++;
    }
    
    public function addAssist() {
        $this->assists++;
    }
    
    public function getInfo() {
        return parent::getInfo() . ", Position: {$this->position}, Jersey: #{$this->jerseyNumber}, Student ID: {$this->studentId}, Goals: {$this->goals}, Assists: {$this->assists}";
    }
    
    public function play() {
        return "{$this->name} is playing as {$this->position}.";
    }
}

// Staff class - inherits from Person
class Staff extends Person {
    private $role;
    private $department;
    
    public function __construct($id, $name, $age, $address, $phoneNumber, $role, $department) {
        parent::__construct($id, $name, $age, $address, $phoneNumber);
        $this->role = $role;
        $this->department = $department;
    }
    
    public function getRole() {
        return $this->role;
    }
    
    public function getDepartment() {
        return $this->department;
    }
    
    public function setRole($role) {
        $this->role = $role;
    }
    
    public function setDepartment($department) {
        $this->department = $department;
    }
    
    public function getInfo() {
        return parent::getInfo() . ", Role: {$this->role}, Department: {$this->department}";
    }
    
    public function work() {
        return "{$this->name} is working as {$this->role} in {$this->department} department.";
    }
}

// Team class
class Team {
    private $teamId;
    private $name;
    private $ageGroup;
    private $headCoach;
    private $assistantCoach;
    private $players;
    private $matchesPlayed;
    private $wins;
    private $draws;
    private $losses;
    
    public function __construct($teamId, $name, $ageGroup) {
        $this->teamId = $teamId;
        $this->name = $name;
        $this->ageGroup = $ageGroup;
        $this->players = [];
        $this->matchesPlayed = 0;
        $this->wins = 0;
        $this->draws = 0;
        $this->losses = 0;
    }
    
    public function getTeamId() {
        return $this->teamId;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getAgeGroup() {
        return $this->ageGroup;
    }
    
    public function setHeadCoach(Coach $coach) {
        if ($coach->getCoachType() === "Head Coach") {
            $this->headCoach = $coach;
        }
    }
    
    public function setAssistantCoach(Coach $coach) {
        if ($coach->getCoachType() === "Assistant Coach") {
            $this->assistantCoach = $coach;
        }
    }
    
    public function addPlayer(Player $player) {
        if (count($this->players) < 15) {
            $this->players[] = $player;
        } else {
            throw new Exception("Team already has maximum 15 players.");
        }
    }
    
    public function getPlayers() {
        return $this->players;
    }
    
    public function getHeadCoach() {
        return $this->headCoach;
    }
    
    public function getAssistantCoach() {
        return $this->assistantCoach;
    }
    
    public function getMatchesPlayed() {
        return $this->matchesPlayed;
    }
    
    public function getWins() {
        return $this->wins;
    }
    
    public function getDraws() {
        return $this->draws;
    }
    
    public function getLosses() {
        return $this->losses;
    }
    
    public function recordMatch($result) {
        $this->matchesPlayed++;
        switch ($result) {
            case 'win':
                $this->wins++;
                break;
            case 'draw':
                $this->draws++;
                break;
            case 'loss':
                $this->losses++;
                break;
        }
    }
    
    public function getTeamInfo() {
        $info = "Team: {$this->name} ({$this->ageGroup})\n";
        $info .= "Head Coach: " . ($this->headCoach ? $this->headCoach->getName() : "Not assigned") . "\n";
        $info .= "Assistant Coach: " . ($this->assistantCoach ? $this->assistantCoach->getName() : "Not assigned") . "\n";
        $info .= "Players: " . count($this->players) . "/15\n";
        $info .= "Record: W{$this->wins} D{$this->draws} L{$this->losses}\n";
        return $info;
    }
}

// Club class
class Club {
    private $clubId;
    private $name;
    private $founded;
    private $address;
    private $teams;
    private $staff;
    
    public function __construct($clubId, $name, $founded, $address) {
        $this->clubId = $clubId;
        $this->name = $name;
        $this->founded = $founded;
        $this->address = $address;
        $this->teams = [];
        $this->staff = [];
    }
    
    public function getClubId() {
        return $this->clubId;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getFounded() {
        return $this->founded;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function addTeam(Team $team) {
        $this->teams[] = $team;
    }
    
    public function addStaff(Staff $staff) {
        $this->staff[] = $staff;
    }
    
    public function getTeams() {
        return $this->teams;
    }
    
    public function getStaff() {
        return $this->staff;
    }
    
    public function getClubInfo() {
        $info = "Club: {$this->name}\n";
        $info .= "Founded: {$this->founded}\n";
        $info .= "Address: {$this->address}\n";
        $info .= "Teams: " . count($this->teams) . "\n";
        $info .= "Staff: " . count($this->staff) . "\n";
        return $info;
    }
}

// Example usage and testing
try {
    // Create FC Cakrawala club
    $fcCakrawala = new Club(1, "FC Cakrawala", 2024, "Universitas Cakrawala, Jakarta");
    
    // Create coaches
    $headCoach = new Coach(1, "John Doe", 45, "Jakarta", "08123456789", "UEFA A", 10, "Head Coach");
    $assistantCoach = new Coach(2, "Jane Smith", 38, "Jakarta", "08123456790", "UEFA B", 7, "Assistant Coach");
    
    // Create FC Cakrawala Muda team
    $fcCakrawalaMuda = new Team(1, "FC Cakrawala Muda", "U-23");
    $fcCakrawalaMuda->setHeadCoach($headCoach);
    $fcCakrawalaMuda->setAssistantCoach($assistantCoach);
    
    // Create players (15 university students)
    $players = [
        new Player(101, "Ahmad Rizki", 20, "Jakarta", "08111111111", "Goalkeeper", 1, "12345001"),
        new Player(102, "Budi Santoso", 21, "Jakarta", "08111111112", "Defender", 2, "12345002"),
        new Player(103, "Candra Wijaya", 22, "Jakarta", "08111111113", "Defender", 3, "12345003"),
        new Player(104, "Doni Pradana", 20, "Jakarta", "08111111114", "Defender", 4, "12345004"),
        new Player(105, "Eko Susanto", 21, "Jakarta", "08111111115", "Defender", 5, "12345005"),
        new Player(106, "Fajar Nugraha", 22, "Jakarta", "08111111116", "Midfielder", 6, "12345006"),
        new Player(107, "Gilang Ramadhan", 20, "Jakarta", "08111111117", "Midfielder", 7, "12345007"),
        new Player(108, "Hendra Gunawan", 21, "Jakarta", "08111111118", "Midfielder", 8, "12345008"),
        new Player(109, "Irfan Hakim", 22, "Jakarta", "08111111119", "Midfielder", 9, "12345009"),
        new Player(110, "Joko Widodo", 20, "Jakarta", "08111111120", "Midfielder", 10, "12345010"),
        new Player(111, "Krisna Bayu", 21, "Jakarta", "08111111121", "Forward", 11, "12345011"),
        new Player(112, "Lukman Hakim", 22, "Jakarta", "08111111122", "Forward", 12, "12345012"),
        new Player(113, "Maman Suryaman", 20, "Jakarta", "08111111123", "Forward", 13, "12345013"),
        new Player(114, "Nanda Pratama", 21, "Jakarta", "08111111124", "Goalkeeper", 14, "12345014"),
        new Player(115, "Oscar Lawalata", 22, "Jakarta", "08111111125", "Defender", 15, "12345015")
    ];
    
    // Add players to team
    foreach ($players as $player) {
        $fcCakrawalaMuda->addPlayer($player);
    }
    
    // Add team to club
    $fcCakrawala->addTeam($fcCakrawalaMuda);
    
    // Create staff
    $staff1 = new Staff(201, "Dr. Siti Nurhaliza", 40, "Jakarta", "08222222221", "Medical Officer", "Health");
    $staff2 = new Staff(202, "Bambang Pamungkas", 35, "Jakarta", "08222222222", "Equipment Manager", "Equipment");
    
    // Add staff to club
    $fcCakrawala->addStaff($staff1);
    $fcCakrawala->addStaff($staff2);
    
    // Display information
    echo "=== FC CAKRAWALA CLUB INFORMATION ===\n";
    echo $fcCakrawala->getClubInfo();
    echo "\n";
    
    echo "=== TEAM INFORMATION ===\n";
    echo $fcCakrawalaMuda->getTeamInfo();
    echo "\n";
    
    echo "=== COACHES ===\n";
    echo "Head Coach: " . $headCoach->getInfo() . "\n";
    echo "Assistant Coach: " . $assistantCoach->getInfo() . "\n";
    echo "\n";
    
    echo "=== PLAYERS ===\n";
    foreach ($players as $player) {
        echo $player->getInfo() . "\n";
    }
    echo "\n";
    
    echo "=== STAFF ===\n";
    foreach ($fcCakrawala->getStaff() as $staff) {
        echo $staff->getInfo() . "\n";
    }
    
    // Simulate some activities
    echo "\n=== ACTIVITIES ===\n";
    echo $headCoach->trainTeam() . "\n";
    echo $players[0]->play() . "\n";
    echo $staff1->work() . "\n";
    
    // Simulate match results
    $fcCakrawalaMuda->recordMatch('win');
    $fcCakrawalaMuda->recordMatch('draw');
    $fcCakrawalaMuda->recordMatch('win');
    
    echo "\n=== UPDATED TEAM RECORD ===\n";
    echo $fcCakrawalaMuda->getTeamInfo();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>