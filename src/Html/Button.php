<?php

    namespace Larakit\Html;

    use Larakit\Html\LHtml;
    use Larakit\Html\Icon;

    /**
     *
     * @author aberdnikov
     */
    class Button extends LHtml {

        protected $_type = 'button';
        protected $_has_closed = true;
        protected $_icon = null;

        /**
         * @return $this
         */
        function sizeLarge() {
            $this
                ->sizeClear()
                ->addClass('btn-lg');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function sizeClear() {
            return $this
                ->addClass('btn')
                ->removeClass('btn-lg btn-sm btn-xs');
        }

        /**
         * @return \Larakit\Html\Button
         */
        function sizeSmall() {
            $this
                ->sizeClear()
                ->addClass('btn-sm');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function sizeExtraSmall() {
            $this
                ->sizeClear()
                ->addClass('btn-xs');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function styleSuccess() {
            $this
                ->styleClear()
                ->addClass('btn-success');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function styleWarning() {
            $this
                ->styleClear()
                ->addClass('btn-warning');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function styleDanger() {
            $this->styleClear()->addClass('btn-danger');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function styleInverse() {
            $this->styleClear()->addClass('btn-inverse');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function styleLink() {
            $this->styleClear()->addClass('btn-link');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function styleDefault() {
            $this->styleClear()->addClass('btn-default');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function stylePrimary() {
            $this->styleClear()->addClass('btn-primary');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function disabledOn() {
            $this->addClass('disabled');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function disabledOff() {
            $this->removeClass('disabled');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function activeOn() {
            $this->addClass('active');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function activeOff() {
            $this->removeClass('active');
            return $this;
        }

        /**
         * @return \Larakit\Html\Button
         */
        function styleClear() {
            return $this
                ->addClass('btn')
                ->removeClass('btn-default btn-primary btn-link btn-default btn-inverse btn-danger btn-warning btn-success');
        }

    }
