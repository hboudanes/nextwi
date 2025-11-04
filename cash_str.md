# Location Configuration
zone:{zone_id}:location
# Example: zone:abc123:location
# TTL: 86400 seconds (24 hours)
# Purpose: Store complete location configuration, profiles, branding, translations

# All Vouchers for a Zone
zone:{zone_id}:vouchers
# Example: zone:abc123:vouchers
# TTL: 43200 seconds (12 hours)
# Purpose: Store all vouchers with hashed access codes

# Individual Voucher Lookup (Fast Access)
zone:{zone_id}:voucher:{hashed_access_code}
# Example: zone:abc123:voucher:5f4dcc3b5aa765d61d8327deb882cf99
# TTL: 86400 seconds (24 hours)
# Purpose: Quick voucher validation without loading all vouchers

# Active Sessions
zone:{zone_id}:sessions
# Example: zone:abc123:sessions
# TTL: 3600 seconds (1 hour)
# Purpose: Track all active user sessions in this zone

# Individual User Session
zone:{zone_id}:session:{mac_address}
# Example: zone:abc123:session:AA:BB:CC:DD:EE:FF
# TTL: Dynamic (based on session timeout)
# Purpose: Store individual user session data

# Session by User ID (for multi-device tracking)
zone:{zone_id}:user:{user_id}:sessions
# Example: zone:abc123:user:student_12345:sessions
# TTL: Dynamic
# Purpose: Track all sessions for a specific user


### Cache Hierarchy

zone:abc123
├── location (main config)
├── vouchers (all vouchers)
├── voucher:{hash1} (individual voucher)
├── voucher:{hash2}
├── voucher:{hash3}
├── sessions (active sessions list)
├── session:{mac1}
├── session:{mac2}
└── user:{user_id}:sessions
```json
zone-id : {
  "cache_key_pattern": "location:{location_id}", we use zone-id  as key 
  "example_key": "location:123",
  "vouchers" : {
    "vouchers_access_code":{ a condution vouchers in location not have same access code 

    }
  },
  "location_data": {
    "id": 123,
    "name": "Downtown Coffee Shop",
    "position": "40.7128, -74.0060",
    "timezone": "America/New_York",
    "note": "Main branch location",
    
    "brand": {
      "logo_url": "https://example.com/uploads/logos/logo_123.png",
      "headline": "Welcome to our WiFi",
      "subheading": "Connect and enjoy free internet",
      "primary_color": "#3B82F6",
      "secondary_color": "#8B5CF6",
      "background_color": "#FFFFFF",
      "text_color": "#111827",
      "background_image_url": "https://example.com/uploads/backgrounds/bg_123.jpg",
      "favicon_url": "https://example.com/uploads/favicons/favicon_123.ico",
      "background_blur": 0,
      "background_opacity": 100,
      "background_contrast": 100,
      "redirection_url": "https://example.com",
      "font_family": "Inter"
    },
    
    "profiles": [
      {
        "id": 1,
        "name": "Guest Access",
        "title": "Connect to Free WiFi",
        "access_policy": "open",
        
        "login_fields": {
          "firstname": {
            "enabled": true,
            "required": true
          },
          "lastname": {
            "enabled": true,
            "required": false
          },
          "gender": {
            "enabled": false,
            "required": false
          },
          "birthday": {
            "enabled": false,
            "required": false
          },
          "email": {
            "enabled": true,
            "required": true
          },
          "mobile": {
            "enabled": true,
            "required": false
          }
        },
        
        "email_verification": true,
        "whatsapp_verification": false
        
        "checkboxes": [
          {
            "id": 1,
            "enabled": true,
            "label": "I agree to Terms & Conditions",
            "content": "Full terms and conditions text here...",
            "required": true
          },
          {
            "id": 2,
            "enabled": true,
            "label": "I accept Data Privacy Policy",
            "content": "Privacy policy text here...",
            "required": true
          },
          {
            "id": 3,
            "enabled": false,
            "label": "I agree to receive marketing emails",
            "content": "Marketing consent text here...",
            "required": false
          }
        ],
        
        "open_access_settings": {
          "daily_limit_enabled": true,
          "session_limit": 60,
          "speed_limit_enabled": true,
          "bandwidth_limit": 10.0
        },
        
        "account_access_settings": null
      },
      {
        "id": 2,
        "name": "Premium Access",
        "title": "Premium WiFi Access",
        "access_policy": "account",
        
        "login_fields": {
          "firstname": {"enabled": true, "required": true},
          "lastname": {"enabled": true, "required": true},
          "email": {"enabled": true, "required": true},
          "mobile": {"enabled": false, "required": false}
        },
        
        "verification": {
          "email_verification": false,
          "whatsapp_verification": false
        },
        
        "checkboxes": [],
        
        "open_access_settings": null,
        
        "account_access_settings": {
          "voucher_enabled": true,
          "password_enabled": true,
          "access_password": "premium2024"
        }
      }
    ],
    
    "translations": {
      "en": {
        "headline": "Welcome!",
        "subheading": "Connect to WiFi",
        "first_name": "First Name",
        "first_name_placeholder": "Enter first name",
        "last_name": "Last Name",
        "email": "Email",
        "email_placeholder": "Enter email",
        "mobile": "Mobile",
        "connect_button": "Connect",
        "validation_messages": {
          "required": "This field is required",
          "invalid_email": "Please enter a valid email",
          "invalid_mobile": "Please enter a valid mobile number"
        }
      },
      "fr": {
        "headline": "Bienvenue!",
        "subheading": "Connectez-vous au WiFi",
        "first_name": "Prénom",
        "first_name_placeholder": "Entrez le prénom",
        "connect_button": "Connecter"
      },
      "ar": {
        "headline": "مرحبا!",
        "subheading": "اتصل بالواي فاي",
        "first_name": "الاسم الأول",
        "connect_button": "اتصل"
      }
    },
    
    "gateway": {
      "post_url": "https://gateway.example.com/api/auth",
      "username": "gateway_user",
      "password": "gateway_pass",
      "type": "mikrotik"
    },
    
    "metadata": {
      "created_at": "2024-11-03T10:30:00Z",
      "updated_at": "2024-11-03T15:45:00Z",
      "created_by": 1,
      "is_active": true
    }
  }
}
```