<?php
/**
 * Created by PhpStorm.
 * User: sasha
 * Date: 17.02.19
 * Time: 11:41
 */

namespace App\Service;


class FakeProductGenerator
{
    private $images=["https://avatars.mds.yandex.net/get-mpic/1244413/img_id6922622469270169228.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1364191/img_id415061979655168621.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1345185/img_id8356138855558132796.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1336510/img_id7420867335851468230.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/397397/img_id5739895189083109435/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/906397/img_id6605308019270914003.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/199079/img_id1492029493328503242.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/200316/img_id4405617333422780220/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/195452/img_id3245351284371180438/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/466729/img_id8119936638882599012/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1246680/img_id7549385771992764056.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1101307/img_id6096704238559277893.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1336510/img_id5341916572873690657.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1331400/img_id4065207526854997010.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1361544/img_id7499166826594719059.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/200316/img_id6967143878030596145.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/200316/img_id6640154959002491947/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1042102/img_id7766070938744571261.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1244413/img_id7525530351530067463.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/175985/img_id325062018137721081/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/397397/img_id2973357894774559191.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/96484/img_id6948012385541515467/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/200316/img_id6380105977935966161.png/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/195452/img_id262408371886298311/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/200316/img_id6020807639998846786.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1626700/img_id6569743689093396946.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/466729/img_id6799008021706465147.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/195452/img_id1232755450230014501/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/397397/img_id3512827779674141530.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/200316/img_id7079235940947557626/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/1361544/img_id1088410963110425847.jpeg/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/397397/img_id4029454272235484760/9hq",
                    "https://avatars.mds.yandex.net/get-mpic/195452/img_id5406212599736293970/9hq"
    ];

    public function getRandomImage(): string
    {
        return $this->images[rand(0,32)];

    }


}