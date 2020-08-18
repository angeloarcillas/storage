# REFACTORING

## Rule of Three
1. Get it done
2. then cringe at repeating but do the same
3. finally Refactor

## When to refactor
- Adding a feature         # It helps to make changes and understand better for you and others.
- Fixing a bug             # Bugs in code behave just like those in real life; they live in the darkest, dirtiest places in the code.
- during code review

## How to refactor
- New functionality should`nt be created
- all existing test must pass after refactoring


## Clean code
- Clean code doesn`t contain duplication
- " contains a minimal number of classes and other moving parts
- " passes all test


## technical dept
**Causes**
- Forced roll out features
- Failing to combat the strict coherance of components
- Lack of tests
- Lack of documentation
- Lack of interaction between team members
- Long-term simultaneous development in several branches
- Delayed refactoring
- Incompetent programming

## Code smells
**Bloaters**
- Long methods
- Long parameter list
- Large classes
- Primitive obsession
- Data clumps

**Obeject-oriention abuser**
- Alternate classes with different interfaces
- Refused bequest
- switch statement
- temporary field

**Change preventers**
- Divergent change
- Parallel inheritance heiarchies
- Shutgun Surgery

**Dispensables**
- Comments
- Data class
- Lazy class
- Duplicate code
- Dead code
- Speculative generality

**Couplers**
- Feature envy
- Incomplete library class
- Middle man
- Inappropriate intimacy
- Message chains
