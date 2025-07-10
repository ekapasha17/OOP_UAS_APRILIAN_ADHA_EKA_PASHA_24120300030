# FC Cakrawala Football Club Management System
## Object-Oriented Programming Final Exam Project

**Course:** Pemrograman Berbasis Obyek (3 SKS)  
**Class:** Object-Oriented Programming (OOP)  
**Lecturer:** Lintang Wisesa Atissalam, S.Si., M.T.I.  
**University:** Cakrawala University  
**Date:** July 10, 2025

---

## 📋 Project Overview

This project implements a comprehensive **Football Club Management System** for FC Cakrawala using Object-Oriented Programming principles in PHP. The system manages players, coaches, staff, and teams with an advanced **Factory Method Pattern** implementation.

### 🏆 FC Cakrawala Club Structure
- **Club Name:** FC Cakrawala
- **Team:** FC Cakrawala Muda (U-23)
- **Personnel:**
  - 1 Head Coach
  - 1 Assistant Coach  
  - 15 University Student Players
  - Support Staff (Medical Officer, Equipment Manager, etc.)

---

## 📁 Project Files

### 1. `OOP_UAS1_[nama]_[nim].php`
**Initial Implementation** - Basic OOP structure following the provided UML diagram.

**Features:**
- Basic class hierarchy with inheritance
- Person as base class
- Coach, Player, Staff as derived classes
- Team and Club management
- Sample data and testing

**Key Classes:**
- `Person` (Base class)
- `Coach extends Person`
- `Player extends Person` 
- `Staff extends Person`
- `Team` (Manages coaches and players)
- `Club` (Manages teams and staff)

### 2. `OOP_UAS2_[nama]_[nim].png`
**UML Class Diagram** - Improved design with Factory Method Pattern.

**Improvements Made:**
- Added abstract `PersonFactory` class
- Created concrete factories: `CoachFactory`, `PlayerFactory`, `StaffFactory`
- Implemented proper Factory Method pattern structure
- Enhanced relationships and dependencies
- Added `PersonManager` for unified factory management

**Design Pattern Benefits:**
- Decouples object creation from business logic
- Provides extensibility for new person types
- Maintains consistency across object creation
- Follows Open/Closed Principle

### 3. `OOP_UAS3_[nama]_[nim].php`
**Advanced Implementation** - Complete Factory Method Pattern implementation.

**Enhanced Features:**
- Abstract `PersonFactory` with factory method
- Concrete factory implementations
- `PersonManager` for centralized factory management
- Improved error handling and validation
- Comprehensive testing and demonstration
- Advanced OOP concepts implementation

---

## 🏗️ Architecture & Design Patterns

### Factory Method Pattern Implementation

```php
// Abstract Factory
abstract class PersonFactory {
    abstract public function createPerson($id, $name, $age, $address, $phoneNumber, ...$additionalParams);
    abstract public function getPersonType();
}

// Concrete Factories
class CoachFactory extends PersonFactory { ... }
class PlayerFactory extends PersonFactory { ... }
class StaffFactory extends PersonFactory { ... }
```

### Class Hierarchy

```
Person (Abstract Base Class)
├── Coach
│   ├── Head Coach
│   └── Assistant Coach
├── Player (University Students)
│   ├── Goalkeeper
│   ├── Defender
│   ├── Midfielder
│   └── Forward
└── Staff
    ├── Medical Officer
    ├── Equipment Manager
    └── Administration
```

### Factory Management

```
PersonManager
├── CoachFactory
├── PlayerFactory
└── StaffFactory
```

---

## 🎯 OOP Principles Demonstrated

### 1. **Encapsulation**
- Private attributes with public getters/setters
- Protected members for inheritance
- Access control implementation

```php
class Person {
    protected $id;          // Accessible to subclasses
    private $phoneNumber;   // Private to class
    public function getName() { ... } // Public interface
}
```

### 2. **Inheritance**
- Person as base class for all personnel
- Shared attributes and methods
- Specialized behavior in subclasses

```php
class Coach extends Person {
    private $license;
    public function trainTeam() { ... }
}
```

### 3. **Polymorphism**
- Abstract methods with different implementations
- Same interface, different behaviors
- Method overriding

```php
abstract class Person {
    abstract public function getRole(); // Implemented differently in each subclass
}
```

### 4. **Abstraction**
- Abstract PersonFactory class
- Abstract Person class with common interface
- Hidden implementation details

---

## 🚀 Key Features

### Team Management
- **Squad Limit:** Maximum 15 players per team
- **Coach Roles:** Differentiated Head and Assistant coaches
- **Match Records:** Win/Draw/Loss tracking
- **Player Statistics:** Goals and assists tracking

### Factory Method Benefits
- **Extensibility:** Easy to add new person types
- **Maintainability:** Isolated creation logic
- **Consistency:** Uniform creation interface
- **Flexibility:** Dynamic object creation

### Error Handling
- Invalid person type validation
- Team capacity limits
- Coach role validation
- Comprehensive exception handling

---

## 📊 Data Structure

### Sample Data Included

**Coaches:**
- John Doe (Head Coach) - UEFA A License, 10 years experience
- Jane Smith (Assistant Coach) - UEFA B License, 7 years experience

**Players (15 University Students):**
- Ahmad Rizki (GK #1) - Student ID: 12345001
- Budi Santoso (DF #2) - Student ID: 12345002
- ... (13 more players with complete details)

**Staff:**
- Dr. Siti Nurhaliza - Medical Officer
- Bambang Pamungkas - Equipment Manager

---

## 🧪 Testing & Demonstration

### Comprehensive Testing Includes:
1. **Object Creation:** Using factories vs direct instantiation
2. **Polymorphism:** Same interface, different behaviors
3. **Team Operations:** Adding players, assigning coaches
4. **Match Simulation:** Recording wins, draws, losses
5. **Error Scenarios:** Invalid operations and validations

### Sample Output:
```
=== FACTORY METHOD PATTERN DEMONSTRATION ===
Available person types: coach, player, staff

Created coaches using CoachFactory:
- ID: 1, Name: John Doe, Age: 45, Address: Jakarta, Phone: 08123456789, License: UEFA A, Experience: 10 years, Type: Head Coach

=== FC CAKRAWALA CLUB INFORMATION ===
Club: FC Cakrawala
Founded: 2024
Address: Universitas Cakrawala, Jakarta
Teams: 1
Staff: 2
```

---

## 💡 Advanced Concepts Implementation

### 1. **Factory Method Pattern**
- Provides interface for creating objects
- Lets subclasses decide which class to instantiate
- Promotes loose coupling

### 2. **Manager Pattern**
- PersonManager centralizes factory access
- Provides unified interface for object creation
- Manages multiple factory types

### 3. **Template Method Pattern**
- Abstract Person class defines template
- Subclasses implement specific behaviors
- Consistent structure across implementations

### 4. **Composition Over Inheritance**
- Team contains Coaches and Players
- Club contains Teams and Staff
- Flexible object relationships

---

## 🔧 Technical Specifications

### Requirements:
- **Language:** PHP 7.4+
- **Paradigm:** Object-Oriented Programming
- **Design Pattern:** Factory Method
- **Architecture:** Layered with clear separation of concerns

### Code Quality Features:
- **Documentation:** Comprehensive comments and docblocks
- **Error Handling:** Try-catch blocks and custom exceptions
- **Validation:** Input validation and business rule enforcement
- **Testing:** Built-in test cases and demonstrations
- **Coding Standards:** PSR-compliant code structure

---

## 📈 Project Evolution

### Phase 1: Basic Implementation (UAS1)
- Simple inheritance hierarchy
- Basic functionality
- Direct object instantiation

### Phase 2: Design Improvement (UAS2)
- UML diagram with Factory Method pattern
- Identified improvement opportunities
- Planned architecture enhancement

### Phase 3: Advanced Implementation (UAS3)
- Complete Factory Method pattern
- Enhanced error handling
- Comprehensive testing
- Professional code quality

---

## 🎓 Learning Outcomes

This project demonstrates mastery of:

1. **Core OOP Principles**
   - Encapsulation, Inheritance, Polymorphism, Abstraction

2. **Design Patterns**
   - Factory Method Pattern implementation
   - Understanding of when and why to use patterns

3. **Software Architecture**
   - Layered architecture design
   - Separation of concerns
   - Maintainable code structure

4. **Professional Development Practices**
   - Comprehensive documentation
   - Error handling and validation
   - Testing and quality assurance

---

## 📞 Contact Information

**Student:** APRILIAN ADHA EKA PASHA  
**NIM:** 24120300030  
**Class:** OOP7  
**Email:** aprilian.pasha@cakrawala.ac.id

**Lecturer:** Lintang Wisesa Atissalam, S.Si., M.T.I.  
**Course:** Pemrograman Berbasis Obyek  
**Institution:** Cakrawala University

---

## 📝 Conclusion

This FC Cakrawala Football Club Management System successfully demonstrates advanced Object-Oriented Programming concepts through a real-world application. The implementation showcases not only basic OOP principles but also advanced design patterns, making it a comprehensive solution that goes beyond the minimum requirements.

The Factory Method pattern implementation provides a flexible, maintainable, and extensible foundation for the club management system, demonstrating understanding of both theoretical concepts and practical application in software development.

**Thank you for reviewing this project!** 🏆