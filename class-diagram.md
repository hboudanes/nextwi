# NextWi Database Class Diagram

```mermaid
---
config:
  theme: forest
---
classDiagram
direction TB
    class laravel_permissions {
    }
    class users {
        +bigint_unsigned id
        +varchar name
        +varchar first_name
        +varchar last_name
        +varchar email
        +varchar password
        +varchar phone
        +varchar remember_token
        +boolean status
        +timestamp email_verified_at
        +timestamp created_at
        +timestamp deleted_at
        +timestamp updated_at
    }
    class user_configs {
        +bigint_unsigned id
        +bigint_unsigned user_id
        +integer max_businesses
        +timestamp created_at
        +timestamp updated_at
    }
    class businesses {
        +bigint_unsigned id
        +bigint_unsigned owner_id
        +varchar name
        +varchar email
        +varchar country
        +integer max_locations
        +varchar tax_id
        +varchar billing_address_1
        +varchar billing_address_2
        +varchar billing_city
        +varchar billing_country
        +varchar contact_first_name
        +varchar contact_last_name
        +varchar contact_position
        +varchar contact_phone
        +varchar contact_email
        +text package_details
        +integer whatsapp_verification_point
        +integer email_verification_point
        +integer advance_value
        +timestamp created_at
        +timestamp updated_at
    }
    class locations {
        +bigint_unsigned id
        +bigint_unsigned business_id
        +bigint_unsigned operator_id
        +bigint_unsigned promotion_id
        +bigint_unsigned access_policy_id
        +bigint_unsigned brand_config_id
        +varchar name
        +decimal lat
        +decimal log
        +varchar time_zone
        +varchar zone_id
        +text post_url
        +varchar username
        +text password
        +varchar type
        +integer credit
        +smallint status
        +timestamp created_at
        +timestamp updated_at
    }
    class brand_configs {
        +bigint_unsigned id
        +bigint_unsigned business_id
        +varchar logo_url
        +varchar headline
        +varchar subheading
        +varchar primary_color
        +varchar secondary_color
        +varchar background_color
        +varchar text_color
        +varchar background_image_url
        +varchar favicon_url
        +integer background_blur
        +integer background_opacity
        +integer background_contrast
        +varchar redirection_url
        +varchar font_family
        +text terms_url
        +text privacy_url
        +timestamp created_at
        +timestamp updated_at
    }
    class location_user {
        +bigint_unsigned location_id
        +bigint_unsigned user_id
        +timestamp created_at
        +timestamp updated_at
    }
    class profiles {
        +bigint_unsigned id
        +bigint_unsigned location_id
        +varchar name
        +varchar title
        +boolean open_access
        +boolean vouchers_base
        +boolean password_base
        +boolean firstname_enabled
        +boolean firstname_required
        +boolean lastname_enabled
        +boolean lastname_required
        +boolean gender_enabled
        +boolean gender_required
        +boolean birthday_enabled
        +boolean birthday_required
        +boolean email_enabled
        +boolean email_required
        +boolean mobile_enabled
        +boolean mobile_required
        +boolean email_verification
        +boolean whatsapp_verification
        +json checkboxes
        +timestamp created_at
        +timestamp updated_at
    }
    class translations {
        +bigint_unsigned id
        +bigint_unsigned location_id
        +enum lang
        +json data
        +timestamp created_at
        +timestamp updated_at
    }
    class access_policies {
        +bigint_unsigned id
        +boolean daily_limit_enabled
        +integer session_limit
        +boolean speed_limit_enabled
        +decimal bandwidth_limit
        +timestamp created_at
        +timestamp updated_at
    }
    class plans {
        +bigint_unsigned id
        +varchar name
        +enum group
        +decimal bw_limit
        +timestamp created_at
        +timestamp updated_at
    }
    class billing_factures {
        +bigint_unsigned id
        +bigint_unsigned business_id
        +date start_date
        +date expiration_date
        +decimal amount
        +timestamp created_at
        +timestamp updated_at
    }
    class vouchers {
        +bigint_unsigned id
        +bigint_unsigned location_id
        +bigint_unsigned plan_id
        +bigint_unsigned access_policy_id
        +varchar access_code
        +integer max_uses
        +boolean is_active
        +timestamp start_date
        +timestamp end_date
        +decimal max_speed
        +timestamp created_at
        +timestamp updated_at
    }
    class guests {
        +bigint_unsigned id
        +uuid uuid
        +bigint_unsigned location_id
        +varchar tag
        +varchar zone_id
        +varchar email
        +varchar fullname
        +varchar whatsapp
        +varchar gender
        +varchar language
        +boolean email_verified
        +boolean whatsapp_verified
        +timestamp first_seen
        +timestamp last_seen
        +json dynamic_field
        +boolean state
        +timestamp created_at
        +timestamp updated_at
    }
    class devices {
        +bigint_unsigned id
        +bigint_unsigned guest_id
        +varchar mac_address
        +varchar vendor
        +varchar device_type
        +timestamp created_at
        +timestamp updated_at
    }
    class voucher_usages {
        +bigint_unsigned id
        +bigint_unsigned voucher_id
        +bigint_unsigned guest_id
        +varchar ip_address
        +timestamp created_at
        +timestamp updated_at
    }
    class location_transactions {
        +bigint_unsigned id
        +bigint_unsigned user_id
        +bigint_unsigned location_id
        +varchar platform_name
        +integer value
        +enum operation_type
        +timestamp created_at
        +timestamp updated_at
    }
    class business_transactions {
        +bigint_unsigned id
        +bigint_unsigned business_id
        +integer value
        +enum operation_type
        +timestamp created_at
        +timestamp updated_at
    }
    class brand_config_business {
        +bigint_unsigned business_id
        +bigint_unsigned brand_config_id
        +timestamp created_at
        +timestamp updated_at
    }
    users "1" -- "1" user_configs : has
    users "1" -- "*" businesses : owns
    users "1" -- "*" location_transactions : performs
    businesses "1" -- "*" locations : has
    businesses "1" -- "*" brand_configs : has
    businesses "1" -- "*" billing_factures : has
    businesses "1" -- "*" business_transactions : tracks
    businesses "*" -- "*" brand_configs : shares
    brand_config_business "*" -- "1" businesses : links
    brand_config_business "*" -- "1" brand_configs : links
    locations "*" -- "1" brand_configs : uses
    locations "*" -- "1" users : operated_by
    locations "1" -- "*" location_user : has
    locations "1" -- "*" translations : has
    locations "1" -- "*" profiles : has
    locations "1" -- "*" vouchers : has
    locations "1" -- "*" location_transactions : tracks
    location_user "*" -- "1" users : belongs_to
    vouchers "*" -- "1" access_policies : has
    vouchers "*" -- "1" plans : uses
    vouchers "1" -- "*" voucher_usages : tracks
    guests "1" -- "*" devices : has
    guests "1" -- "*" voucher_usages : uses


```


## Relationships

- **User to UserConfig**: One-to-one relationship. A user can have one configuration.
- **User to Business**: One-to-many relationship. A user can own multiple businesses.
- **Business to Location**: One-to-many relationship. A business can have multiple locations.
- **Location to BrandConfig**: Many-to-one relationship. Multiple locations can use the same brand configuration.
- **Location to User**: Many-to-many relationship through LocationUser table. Users can have access to multiple locations.
- **Location to User (Operator)**: Many-to-one relationship. A location has one operator (which is a user).