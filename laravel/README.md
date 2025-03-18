# ER図
```
erDiagram
    USER {
        int id PK
        string name
        string email
        string password
        datetime created_at
        datetime updated_at
    }
    
    RUNNING_RECORD {
        int id PK
        int user_id FK
        date run_date
        float distance
        datetime created_at
        datetime updated_at
    }
    
    USER ||--o{ RUNNING_RECORD : "has many"
```