<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     Roardom <roardom@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateForumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array<\Illuminate\Contracts\Validation\Rule|string>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'position' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'parent_id' => [
                'sometimes',
                'nullable',
                'integer',
            ],
            'permissions' => [
                'array',
            ],
            'permissions.*' => [
                'exists:groups,id',
            ],
            'permissions.*.read_topic' => [
                'boolean',
            ],
            'permissions.*.reply_topic' => [
                'boolean',
            ],
            'permissions.*.start_topic' => [
                'boolean',
            ],
            'forum_type' => [
                'in:category,forum',
            ],
        ];
    }
}
