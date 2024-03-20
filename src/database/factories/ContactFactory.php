<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $details = ['届いた商品が注文した商品ではありませんでした。商品の交換をお願いします。', '注文した商品が1ヶ月経っても届きません。', '商品に不具合があるので交換したいです。', '商品が故障したのですが、保証期間内なので無償で修理できますか？', '商品を返品したのですが、返金されていません。ご確認をお願いします。'];
        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->email,
            'tel' => str_replace('-', '', $this->faker->phoneNumber),
            'address' => $this->faker->prefecture . $this->faker->city . $this->faker->streetAddress,
            'building' => $this->faker->optional($weight = 0.6)->secondaryAddress(),
            'detail' => $this->faker->randomElement($details),
        ];
    }
}
