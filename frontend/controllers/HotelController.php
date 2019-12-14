<?php


namespace frontend\controllers;

use frontend\models\hotel\Hotel;
use frontend\models\hotel\Order;
use Yii;
use frontend\models\hotel\form\OrderForm;
use frontend\models\hotel\HotelRoom;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Site controller
 */
class HotelController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $listHotel = Hotel::find()->all();

        return $this->render(
            'index',
            [
                'form' => new OrderForm(),
                'listHotel' => $listHotel,
            ]
        );
    }

    /**
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($hotelId)
    {
        if (!Hotel::findOne($hotelId)) {
            throw new NotFoundHttpException(Yii::t('app', 'Not found hotel {id}', ['{id}' => $hotelId]));
        }
        $orderForm = new OrderForm();
        $orderForm->hotelId = $hotelId;
        // ajax validation
        if (Yii::$app->request->isAjax && $orderForm->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($orderForm);
        }

        // create order room
        if (!Yii::$app->request->isAjax && Yii::$app->request->post()) {
            $orderForm->load(Yii::$app->request->post());

            $this->createOrder($orderForm);
        }

        return $this->render('view', ['model' => Hotel::findOne($hotelId), 'formModel' => $orderForm]);
    }

    /**
     * @return mixed
     * @throws NotFoundHttpException
     */
    private function createOrder(OrderForm $orderForm)
    {
        $hotel = $this->loadHotel($orderForm->hotelId);
        $model = new Order();
        $model->load(
            [
                'room_id' => $orderForm->roomId,
                'hotel_id' => $orderForm->hotelId,
                'phone' => $orderForm->phone,
                'username' => $orderForm->username,
                'booked_date_from' => date('Y-m-d', strtotime($orderForm->bookedDateFrom)),
                'booked_date_to' => date('Y-m-d', strtotime($orderForm->bookedDateTo)),
            ],
            ''
        );
        if ($model->save()) {
            $this->setFlashOrder($hotel->title);

            return $this->redirect(['index']);
        }

        return $model;
    }

    /**
     * @param integer $id
     *
     * @return Hotel
     * @throws NotFoundHttpException
     */
    private function loadHotel($id)
    {
        if (!$model = Hotel::findOne($id)) {
            throw new NotFoundHttpException(Yii::t('error', 'Room not found'));
        }

        return $model;
    }

    private function setFlashOrder($name)
    {
        Yii::$app->session->setFlash(
            'order',
            Yii::t(
                'app',
                'Ваш заказ принят в обработку, ожидайте звонка менеджера отеля {name}',
                [
                    'name' => $name,
                ]
            ),
            false
        );
    }
}
