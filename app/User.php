<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait as EntrustUserTrait;
use Auth;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use EntrustUserTrait {
        can as traitCan;
        hasRole as traitHasRole;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'password',
        'register_token',
        'enabled',
        'created_by',
        'promoter_id',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user detail record associated with the user.
     */
    public function userDetail()
    {
        return $this->hasOne('App\Models\AdminUser', 'user_id');
    }
    /**
     * Get the user detail record associated with the ticket_users.
     */
    public function ticketUser()
    {
        return $this->hasOne('App\Models\TicketUser', 'user_id');
    }


    /**
     *
     *
     * @param array $attributes
     * @param $user
     */
    private function assignMembership(array $attributes = [])
    {
        if (array_key_exists('role', $attributes) && ($attributes['role'])) {
            $this->roles()->sync($attributes['role']);
        } else {
            $this->roles()->sync([]);
        }
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * @return string
     */
    public function getFullNameAndUsernameAttribute()
    {
        return "$this->first_name $this->last_name ($this->username)";
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

//    // TODO: Do we need this??
//    /**
//     * @return mixed
//     */
//    public function getLevelMax()
//    {
//        $roles = [];
//        foreach($this->roles as $role)
//        {
//            $roles[] = $role->level;
//        }
//
//        return max($roles);
//    }

    /**
     * @return bool
     */
    public function isEditable()
    {
        // Protect the root user from edits.
        if ('root' == $this->username) {
            return false;
        }
        // Otherwise
        return true;
    }

    /**
     * @return bool
     */
    public function isDeletable()
    {
        // Protect the root user from deletion.
        if ('root' == $this->username) {
            return false;
        }
        // Prevent user from deleting his own account.
        if (Auth::check() && (Auth::user()->id == $this->id)) {
            return false;
        }
        // Otherwise
        return true;
    }

    /**
     * @return bool
     */
    public function canBeDisabled()
    {
        // Protect the root user from being disabled.
        if ('root' == $this->username) {
            return false;
        }
        // Prevent user from disabling his own account.
        if (Auth::check() && (Auth::user()->id == $this->id)) {
            return false;
        }
        // Otherwise
        return true;
    }

    /**
     *
     * Force the user to have the given role.
     *
     * @param $roleName
     */
    public function forceRole($roleName)
    {
        // If the user is not a member to the given role,
        if (null == $this->roles()->where('name', $roleName)->first()) {
            // Load the given role and attach it to the user.
            $roleToForce = Role::where('name', $roleName)->first();
            $this->roles()->attach($roleToForce->id);
        }
    }

    /**
     * Code copy of EntrustUserTrait::hasRole(...) with the one addition to,
     * optionally, check if a role is enabled before returning true.
     *
     * @param $name
     * @param bool $requireAll
     * @return bool
     */
    public function hasRole($name, $requireAll = false, $mustBeEnabled = true)
    {
        if (is_array($name)) {
            foreach ($name as $roleName) {
                $hasRole = $this->hasRole($roleName);

                if ($hasRole && !$requireAll) {
                    return true;
                } elseif (!$hasRole && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the roles were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the roles were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            foreach ($this->roles as $role) {
                if ($role->name == $name) {
                    if ($mustBeEnabled) {
                        if ($role->enabled) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * Code copy of EntrustUserTrait::can(...) with the one addition to check if a role
     * is enabled first the check if a permission is also enabled before
     * returning true.
     *
     * @param $permission
     * @param bool $requireAll
     * @return bool
     */
    public function can($permission, $requireAll = false)
    {
        if (is_array($permission)) {
            foreach ($permission as $permName) {
                $hasPerm = $this->can($permName);

                if ($hasPerm && !$requireAll) {
                    return true;
                } elseif (!$hasPerm && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the perms were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the perms were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {

            foreach ($this->roles as $role) {
                if ($role->enabled) {

                    // Validate against the Permission table
                    foreach ($role->perms as $perm) {
                        if (($perm->enabled) && ($perm->name == $permission)) {
                            return true;
                        }
                    }
                }
            }
        }

        return false;
    }

    /**
     * Overwrite Model::create(...) to save group membership if included,
     * or clear it if not. Also force membership to group 'users'.
     *
     * @param array $attributes
     * @return static
     */
    public static function create(array $attributes = [], $force_user_role = true)
    {

        // Call original create method from parent
        $user = parent::create($attributes);

        // Assign membership(s)
        $user->assignMembership($attributes);

        // Force membership to group 'users'
        if ($force_user_role)
            $user->forceRole('users');

        return $user;
    }

    /**
     * Overwrite Model::update(...) to save group membership if included,
     * or clear it if not. Also force membership to group 'users'.
     *
     * @param array $attributes
     * @param array $options
     * @return $this
     */
    public function update(array $attributes = [], array $options = [])
    {

        if (array_key_exists('first_name', $attributes)) {
            $this->first_name = $attributes['first_name'];
        }
        if (array_key_exists('last_name', $attributes)) {
            $this->last_name = $attributes['last_name'];
        }
        if (array_key_exists('username', $attributes)) {
            $this->username = $attributes['username'];
        }
        if (array_key_exists('email', $attributes)) {
            $this->email = $attributes['email'];
        }
        if (array_key_exists('password', $attributes)) {
            $this->password = $attributes['password'];
        }
        if (array_key_exists('enabled', $attributes)) {
            $this->enabled = $attributes['enabled'];
        }

        $this->save();

        // Assign membership(s)
        $this->assignMembership($attributes);

        // Force membership to group 'users'
        if (!empty($options) && isset($options['force_user_role']) && $options['force_user_role'])
            $this->forceRole('users');

        return $this;

    }

    /**
     * Implements the 'isMemberOf(...)' as required by Eloquent-LDAP by using
     * the hasRole method and ignoring the enable state of the role.
     *
     * @param $name
     * @return bool
     */
    public function isMemberOf($name)
    {
        return $this->hasRole($name, false, false);
    }

    /**
     * Implements the 'membershipList()' method as required by Eloquent-LDAP.
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function membershipList()
    {
        return $this->roles();
    }
}
