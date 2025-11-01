# NextWi Database Class Diagram

```mermaid
classDiagram
    class User {
        +id: bigint unsigned
        +name: varchar(255)
        +first_name: varchar(255)
        +last_name: varchar(255)
        +email: varchar(255)
        +email_verified_at: timestamp
        +password: varchar(255)
        +phone: varchar(50)
        +remember_token: varchar(100)
        +status: varchar(20)
        +created_at: timestamp
        +updated_at: timestamp
    }

    class UserConfig {
        +id: bigint unsigned
        +user_id: bigint unsigned
        +max_businesses: integer
        +created_at: timestamp
        +updated_at: timestamp
    }

    class Business {
        +id: bigint unsigned
        +name: varchar(255)
        +contact_name: varchar(255)
        +email: varchar(255)
        +phone: varchar(50)
        +tax_id: varchar(100)
        +credit: integer
        +billing_address: text
        +billing_city: varchar(100)
        +billing_details: varchar(100)
        +billing_country: varchar(100)
        +billing_postal_code: varchar(20)
        +dynamic_integration: json
        +status: smallint
        +created_at: timestamp
        +updated_at: timestamp
    }

    class Location {
        +id: bigint unsigned
        +business_id: bigint unsigned
        +operator_id: bigint unsigned
        +promotion_id: bigint unsigned
        +access_policy_id: bigint unsigned
        +brand_config_id: bigint unsigned
        +location_name: varchar(255)
        +zone_id: varchar(32)
        +terms_url: text
        +privacy_url: text
        +email_verification: boolean
        +email_whatsapp: boolean
        +credit: integer
        +status: smallint
        +created_at: timestamp
        +updated_at: timestamp
        +post_url: varchar(255)
        +username: varchar(255)
        +password: text
        +dynamic_profile: json
        +type: varchar(50)
        +redirection_url: varchar(100)
    }

    class BrandConfig {
        +id: bigint unsigned
        +title: varchar(255)
        +subtitle: varchar(255)
        +logo_url: text
        +background_image_url: text
        +favicon_url: text
        +primary_color: varchar(7)
        +secondary_color: varchar(7)
        +header_background_color: varchar(7)
        +header_text_color: varchar(7)
        +footer_background_color: varchar(7)
        +footer_text_color: varchar(7)
        +button_color: varchar(7)
        +button_text_color: varchar(7)
        +primary_font: varchar(100)
        +secondary_font: varchar(100)
        +welcome_message: text
        +custom_css: text
        +created_at: timestamp
        +updated_at: timestamp
    }

    class LocationUser {
        +location_id: bigint unsigned
        +user_id: bigint unsigned
    }

    User "1" -- "1" UserConfig : has
    User "1" -- "*" Business : owns
    Business "1" -- "*" Location : has
    Location "*" -- "1" BrandConfig : uses
    Location "*" -- "*" User : has access via
    Location -- LocationUser
    User -- LocationUser
    User "1" -- "*" Location : operates as operator_id
```

## Relationships

- **User to UserConfig**: One-to-one relationship. A user can have one configuration.
- **User to Business**: One-to-many relationship. A user can own multiple businesses.
- **Business to Location**: One-to-many relationship. A business can have multiple locations.
- **Location to BrandConfig**: Many-to-one relationship. Multiple locations can use the same brand configuration.
- **Location to User**: Many-to-many relationship through LocationUser table. Users can have access to multiple locations.
- **Location to User (Operator)**: Many-to-one relationship. A location has one operator (which is a user).