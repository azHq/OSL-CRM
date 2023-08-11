<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
        'status',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });


        self::created(function ($user) {
            $newUser = new User();
            $role = $newUser->getRoleByID($user->role_id);
            NewLog::create('New "' . $role . '" added', 'A "' . $role . '" "' . $user->name . '" has been added.');
        });

        self::updated(function ($user) {
            $updatedFields = '';
            foreach ($user->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key . ',');
            }
            $newUser = new User();
            $role = $newUser->getRoleByID($user->role_id);

            NewLog::create('"' . $role . '" Updated', '"' . $role . '" "' . $user->name . '" has been updated. Changed fields are' . $updatedFields . '.');
        });

        self::deleting(function ($user) {
            Lead::where('owner_id', $user->id)->update([
                'owner_id' =>null
            ]);
        });
        
        self::deleted(function ($user) {
            $newUser = new User();
            $role = $newUser->getRoleByID($user->role_id);
            NewLog::create('"' . $role . '" Deleted', 'Task "' . $user->name . '" has been deleted.');
        });
    }

    public function scopeStudents($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        });
    }
    public function getRoleByID($id)
    {
        $role = Role::find($id);

        if ($role) {
            if ($role['name'] == 'main-super-admin') {
                return 'Manager';
            }
            if ($role['name'] == 'super-admin') {
                return 'Admin';
            } else if ($role['name'] == 'admin') {
                return 'Counsellor';
            } else if ($role['name'] == 'cro') {
                return 'CRO';
            } else {
                return 'Student';
            }
        }
        return '';
    }
    public function scopeMainSuperAdmin($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'main-super-admin');
        });
    }

    public function scopeAdmins($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        });
    }

    public function scopeSuperAdmins($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'super-admin');
        });
    }

    public function scopeCros($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'cro');
        });
    }

    public function getRoleAttribute()
    {
        return $this->roles()->first()->name;
    }

    public function getRoleNameAttribute()
    {
        if ($this->roles()->first()->name == 'main-super-admin') {
            return 'Manager';
        }
        if ($this->roles()->first()->name == 'super-admin') {
            return 'Admin';
        } else if ($this->roles()->first()->name == 'admin') {
            return 'Counsellor';
        } else if ($this->roles()->first()->name == 'cro') {
            return 'CRO';
        } else {
            return 'Student';
        }
    }
}
