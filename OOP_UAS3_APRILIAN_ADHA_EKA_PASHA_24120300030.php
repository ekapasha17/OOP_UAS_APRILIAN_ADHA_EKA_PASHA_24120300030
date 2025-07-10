<?php

// Abstract PersonFactory class - Factory Method Pattern
abstract class PersonFactory {
    abstract public function createPerson($id, $name, $age, $address, $phoneNumber, ...$additionalParams);
    abstract public function getPersonType();
}

// Abstract Person class
abstract class Person {
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
    
    // Abstract method to be implemented by subclasses
    abstract public function getRole();
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
    
    public function getRole() {
        return "Coach";
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
    
    public function getRole() {
        return "Player";
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
    
    public function getStaffRole() {
        return $this->role;
    }
    
    public function getDepartment() {
        return $this->department;
    }
    
    public function setStaffRole($role) {
        $this->role = $role;
    }
    
    public function setDepartment($department) {
        $this->department = $department;
    }
    
    public function getInfo() {
        return parent::getInfo() . ", Role: {$this->role}, Department: {$this->department}";
    }
    
    public function getRole() {
        return "Staff";
    }
    
    public function work() {
        return "{$this->name} is working as {$this->role} in {$this->department} department.";
    }
}

// CoachFactory - Concrete Factory for creating Coach objects
class CoachFactory extends PersonFactory {
    public function createPerson($id, $name, $age, $address, $phoneNumber, ...$additionalParams) {
        // Additional params: license, experience, coachType
        $license = $additionalParams[0] ?? "No License";
        $experience = $additionalParams[1] ?? 0;
        $coachType = $additionalParams[2] ?? "Assistant Coach";
        
        return new Coach($id, $name, $age, $address, $phoneNumber, $license, $experience, $coachType);
    }
    
    public function createCoach($id, $name, $age, $address, $phoneNumber, $license, $experience, $coachType) {
        return new Coach($id, $name, $age, $address, $phoneNumber, $license, $experience, $coachType);
    }
    
    public function getPersonType() {
        return "Coach";
    }
}

// PlayerFactory - Concrete Factory for creating Player objects
class PlayerFactory extends PersonFactory {
    public function createPerson($id, $name, $age, $address, $phoneNumber, ...$additionalParams) {
        // Additional params: position, jerseyNumber, studentId
        $position = $additionalParams[0] ?? "Midfielder";
        $jerseyNumber = $additionalParams[1] ?? 0;
        $studentId = $additionalParams[2] ?? "00000000";
        
        return new Player($id, $name, $age, $address, $phoneNumber, $position, $jerseyNumber, $studentId);
    }
    
    public function createPlayer($id, $name, $age, $address, $phoneNumber, $position, $jerseyNumber, $studentId) {
        return new Player($id, $name, $age, $address, $phoneNumber, $position, $jerseyNumber, $studentId);
    }
    
    public function getPersonType() {
        return "Player";
    }
}

// StaffFactory - Concrete Factory for creating Staff objects
class StaffFactory extends PersonFactory {
    public function createPerson($id, $name, $age, $address, $phoneNumber, ...$additionalParams) {
        // Additional params: role, department
        $role = $additionalParams[0] ?? "General Staff";
        $department = $additionalParams[1] ?? "Administration";
        
        return new Staff($id, $name, $age, $address, $phoneNumber, $role, $department);
    }
    
    public function createStaff($id, $name, $age, $address, $phoneNumber, $role, $department) {
        return new Staff($id, $name, $age, $address, $phoneNumber, $role, $department);
    }
    
    public function getPersonType() {
        return "Staff";
    }
}

// PersonManager - Manages all factories and provides unified interface
class PersonManager {
    private $factories;
    
    public function __construct() {
        $this->factories = [
            'coach' => new CoachFactory(),
            'player' => new PlayerFactory(),
            'staff' => new StaffFactory()
        ];
    }
    
    public function createPerson($type, $id, $name, $age, $address, $phoneNumber, ...$additionalParams) {
        $type = strtolower($type);
        
        if (!isset($this->factories[$type])) {
            throw new InvalidArgumentException("Unknown person type: $type");
        }
        
        return $this->factories[$type]->createPerson($id, $name, $age, $address, $phoneNumber, ...$additionalParams);
    }
    
    public function getAvailableTypes() {
        return array_keys($this->factories);
    }
    
    public function getFactory($type) {
        $type = strtolower($type);
        return $this->factories[$type] ?? null;
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
        } else {
            throw new InvalidArgumentException("Coach must be a Head Coach type");
        }
    }
    
    public function setAssistantCoach(Coach $coach) {
        if ($coach->getCoachType() === "Assistant Coach") {
            $this->assistantCoach = $coach;
        } else {
            throw new InvalidArgumentException("Coach must be an Assistant Coach type");
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
    private $personManager;
    
    public function __construct($clubId, $name, $founded, $address) {
        $this->clubId = $clubId;
        $this->name = $name;
        $this->founded = $founded;
        $this->address = $address;
        $this->teams = [];
        $this->staff = [];
        $this->personManager = new PersonManager();
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
    
    public function getPersonManager() {
        return $this->personManager;
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

// Example usage and testing with Factory Method Pattern
try {
    echo "=== FACTORY METHOD PATTERN DEMONSTRATION ===\n\n";
    
    // Create FC Cakrawala club
    $fcCakrawala = new Club(1, "FC Cakrawala", 2024, "Universitas Cakrawala, Jakarta");
    $personManager = $fcCakrawala->getPersonManager();
    
    echo "Available person types: " . implode(", ", $personManager->getAvailableTypes()) . "\n\n";
    
    // Create coaches using factory
    $coachFactory = $personManager->getFactory('coach');
    $headCoach = $coachFactory->createCoach(1, "John Doe", 45, "Jakarta", "08123456789", "UEFA A", 10, "Head Coach");
    $assistantCoach = $coachFactory->createCoach(2, "Jane Smith", 38, "Jakarta", "08123456790", "UEFA B", 7, "Assistant Coach");
    
    echo "Created coaches using CoachFactory:\n";
    echo "- " . $headCoach->getInfo() . "\n";
    echo "- " . $assistantCoach->getInfo() . "\n\n";
    
    // Create FC Cakrawala Muda team
    $fcCakrawalaMuda = new Team(1, "FC Cakrawala Muda", "U-23");
    $fcCakrawalaMuda->setHeadCoach($headCoach);
    $fcCakrawalaMuda->setAssistantCoach($assistantCoach);
    
    // Create players using factory
    $playerFactory = $personManager->getFactory('player');
    
    $playersData = [
        [101, "Ahmad Rizki", 20, "Jakarta", "08111111111", "Goalkeeper", 1, "12345001"],
        [102, "Budi Santoso", 21, "Jakarta", "08111111112", "Defender", 2, "12345002"],
        [103, "Candra Wijaya", 22, "Jakarta", "08111111113", "Defender", 3, "12345003"],
        [104, "Doni Pradana", 20, "Jakarta", "08111111114", "Defender", 4, "12345004"],
        [105, "Eko Susanto", 21, "Jakarta", "08111111115", "Defender", 5, "12345005"],
        [106, "Fajar Nugraha", 22, "Jakarta", "08111111116", "Midfielder", 6, "12345006"],
        [107, "Gilang Ramadhan", 20, "Jakarta", "08111111117", "Midfielder", 7, "12345007"],
        [108, "Hendra Gunawan", 21, "Jakarta", "08111111118", "Midfielder", 8, "12345008"],
        [109, "Irfan Hakim", 22, "Jakarta", "08111111119", "Midfielder", 9, "12345009"],
        [110, "Joko Widodo", 20, "Jakarta", "08111111120", "Midfielder", 10, "12345010"],
        [111, "Krisna Bayu", 21, "Jakarta", "08111111121", "Forward", 11, "12345011"],
        [112, "Lukman Hakim", 22, "Jakarta", "08111111122", "Forward", 12, "12345012"],
        [113, "Maman Suryaman", 20, "Jakarta", "08111111123", "Forward", 13, "12345013"],
        [114, "Nanda Pratama", 21, "Jakarta", "08111111124", "Goalkeeper", 14, "12345014"],
        [115, "Oscar Lawalata", 22, "Jakarta", "08111111125", "Defender", 15, "12345015"]
    ];
    
    $players = [];
    foreach ($playersData as $data) {
        $player = $playerFactory->createPlayer(...$data);
        $players[] = $player;
        $fcCakrawalaMuda->addPlayer($player);
    }
    
    echo "Created 15 players using PlayerFactory\n\n";
    
    // Add team to club
    $fcCakrawala->addTeam($fcCakrawalaMuda);
    
    // Create staff using factory
    $staffFactory = $personManager->getFactory('staff');
    $staff1 = $staffFactory->createStaff(201, "Dr. Siti Nurhaliza", 40, "Jakarta", "08222222221", "Medical Officer", "Health");
    $staff2 = $staffFactory->createStaff(202, "Bambang Pamungkas", 35, "Jakarta", "08222222222", "Equipment Manager", "Equipment");
    
    echo "Created staff using StaffFactory:\n";
    echo "- " . $staff1->getInfo() . "\n";
    echo "- " . $staff2->getInfo() . "\n\n";
    
    // Add staff to club
    $fcCakrawala->addStaff($staff1);
    $fcCakrawala->addStaff($staff2);
    
    // Demonstrate polymorphism through factory
    echo "=== FACTORY METHOD PATTERN BENEFITS ===\n";
    echo "Creating different person types through unified interface:\n\n";
    
    // Using PersonManager to create different types
    $newCoach = $personManager->createPerson('coach', 3, "Roberto Carlos", 50, "Jakarta", "08333333333", "UEFA Pro", 15, "Head Coach");
    $newPlayer = $personManager->createPerson('player', 116, "Dimas Drajad", 19, "Jakarta", "08444444444", "Winger", 16, "12345016");
    $newStaff = $personManager->createPerson('staff', 203, "Sarah Connor", 30, "Jakarta", "08555555555", "Physiotherapist", "Health");
    
    echo "New Coach: " . $newCoach->getInfo() . "\n";
    echo "New Player: " . $newPlayer->getInfo() . "\n";
    echo "New Staff: " . $newStaff->getInfo() . "\n\n";
    
    // Display complete information
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
    
    echo "=== SAMPLE PLAYERS (First 5) ===\n";
    for ($i = 0; $i < 5; $i++) {
        echo ($i + 1) . ". " . $players[$i]->getInfo() . "\n";
    }
    echo "... and 10 more players\n\n";
    
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
    
    // Demonstrate Factory Method Pattern advantages
    echo "\n=== FACTORY METHOD PATTERN ADVANTAGES ===\n";
    echo "1. Encapsulation: Object creation logic is hidden in factories\n";
    echo "2. Flexibility: Easy to add new person types without modifying existing code\n";
    echo "3. Consistency: All person creation follows the same pattern\n";
    echo "4. Maintainability: Changes to creation logic only affect specific factories\n";
    echo "5. Extensibility: New factories can be added to support new person types\n\n";
    
    // Show polymorphism in action
    echo "=== POLYMORPHISM DEMONSTRATION ===\n";
    $allPersons = array_merge([$headCoach, $assistantCoach], $players, [$staff1, $staff2]);
    
    $roleCount = [];
    foreach ($allPersons as $person) {
        $role = $person->getRole();
        $roleCount[$role] = ($roleCount[$role] ?? 0) + 1;
    }
    
    echo "Person count by role:\n";
    foreach ($roleCount as $role => $count) {
        echo "- {$role}: {$count}\n";
    }
    
    echo "\nAll persons have the same base interface but different behaviors:\n";
    echo "- Coach role: " . $headCoach->getRole() . " - " . $headCoach->trainTeam() . "\n";
    echo "- Player role: " . $players[0]->getRole() . " - " . $players[0]->play() . "\n";
    echo "- Staff role: " . $staff1->getRole() . " - " . $staff1->work() . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} catch (InvalidArgumentException $e) {
    echo "Invalid Argument: " . $e->getMessage() . "\n";
}

echo "\n=== PROGRAM COMPLETED SUCCESSFULLY ===\n";
echo "Factory Method Pattern implementation for FC Cakrawala Football Club\n";
echo "This implementation demonstrates:\n";
echo "- Abstract Factory Pattern\n";
echo "- Inheritance and Polymorphism\n";
echo "- Encapsulation\n";
echo "- Object-Oriented Design Principles\n";

?>