@extends('frontend.layouts.app')
@section('content')
<style id="elementor-frontend-inline-css" type="text/css">
  .elementor-kit-4 {
    --e-global-color-primary: #6EC1E4;
    --e-global-color-secondary: #54595F;
    --e-global-color-text: #7A7A7A;
    --e-global-color-accent: #61CE70;
    --e-global-typography-primary-font-family: "Roboto";
    --e-global-typography-primary-font-weight: 600;
    --e-global-typography-secondary-font-family: "Roboto Slab";
    --e-global-typography-secondary-font-weight: 400;
    --e-global-typography-text-font-family: "Roboto";
    --e-global-typography-text-font-weight: 400;
    --e-global-typography-accent-font-family: "Roboto";
    --e-global-typography-accent-font-weight: 500;
  }

  .elementor-section.elementor-section-boxed>.elementor-container {
    max-width: 1140px;
  }

  .e-con {
    --container-max-width: 1140px;
  }

  .elementor-widget:not(:last-child) {
    margin-block-end: 0px;
  }

  .elementor-element {
    --widgets-spacing: 0px 0px;
  }

    {}

  h1.entry-title {
    display: var(--page-title-display);
  }

  @media(max-width:1024px) {
    .elementor-section.elementor-section-boxed>.elementor-container {
      max-width: 1024px;
    }

    .e-con {
      --container-max-width: 1024px;
    }
  }

  @media(max-width:680px) {
    .elementor-section.elementor-section-boxed>.elementor-container {
      max-width: 767px;
    }

    .e-con {
      --container-max-width: 767px;
    }
  }

  .elementor-widget-heading .elementor-heading-title {
    color: var(--e-global-color-primary);
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-image .widget-image-caption {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-text-editor {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
    background-color: var(--e-global-color-primary);
  }

  .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap,
  .elementor-widget-text-editor.elementor-drop-cap-view-default .elementor-drop-cap {
    color: var(--e-global-color-primary);
    border-color: var(--e-global-color-primary);
  }

  .elementor-widget-button .elementor-button {
    font-family: var(--e-global-typography-accent-font-family), Sans-serif;
    font-weight: var(--e-global-typography-accent-font-weight);
    background-color: var(--e-global-color-accent);
  }

  .elementor-widget-divider {
    --divider-color: var(--e-global-color-secondary);
  }

  .elementor-widget-divider .elementor-divider__text {
    color: var(--e-global-color-secondary);
    font-family: var(--e-global-typography-secondary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-secondary-font-weight);
  }

  .elementor-widget-divider.elementor-view-stacked .elementor-icon {
    background-color: var(--e-global-color-secondary);
  }

  .elementor-widget-divider.elementor-view-framed .elementor-icon,
  .elementor-widget-divider.elementor-view-default .elementor-icon {
    color: var(--e-global-color-secondary);
    border-color: var(--e-global-color-secondary);
  }

  .elementor-widget-divider.elementor-view-framed .elementor-icon,
  .elementor-widget-divider.elementor-view-default .elementor-icon svg {
    fill: var(--e-global-color-secondary);
  }

  .elementor-widget-image-box .elementor-image-box-title {
    color: var(--e-global-color-primary);
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-image-box .elementor-image-box-description {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-icon.elementor-view-stacked .elementor-icon {
    background-color: var(--e-global-color-primary);
  }

  .elementor-widget-icon.elementor-view-framed .elementor-icon,
  .elementor-widget-icon.elementor-view-default .elementor-icon {
    color: var(--e-global-color-primary);
    border-color: var(--e-global-color-primary);
  }

  .elementor-widget-icon.elementor-view-framed .elementor-icon,
  .elementor-widget-icon.elementor-view-default .elementor-icon svg {
    fill: var(--e-global-color-primary);
  }

  .elementor-widget-icon-box.elementor-view-stacked .elementor-icon {
    background-color: var(--e-global-color-primary);
  }

  .elementor-widget-icon-box.elementor-view-framed .elementor-icon,
  .elementor-widget-icon-box.elementor-view-default .elementor-icon {
    fill: var(--e-global-color-primary);
    color: var(--e-global-color-primary);
    border-color: var(--e-global-color-primary);
  }

  .elementor-widget-icon-box .elementor-icon-box-title {
    color: var(--e-global-color-primary);
  }

  .elementor-widget-icon-box .elementor-icon-box-title,
  .elementor-widget-icon-box .elementor-icon-box-title a {
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-icon-box .elementor-icon-box-description {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-star-rating .elementor-star-rating__title {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-image-gallery .gallery-item .gallery-caption {
    font-family: var(--e-global-typography-accent-font-family), Sans-serif;
    font-weight: var(--e-global-typography-accent-font-weight);
  }

  .elementor-widget-icon-list .elementor-icon-list-item:not(:last-child):after {
    border-color: var(--e-global-color-text);
  }

  .elementor-widget-icon-list .elementor-icon-list-icon i {
    color: var(--e-global-color-primary);
  }

  .elementor-widget-icon-list .elementor-icon-list-icon svg {
    fill: var(--e-global-color-primary);
  }

  .elementor-widget-icon-list .elementor-icon-list-item>.elementor-icon-list-text,
  .elementor-widget-icon-list .elementor-icon-list-item>a {
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-icon-list .elementor-icon-list-text {
    color: var(--e-global-color-secondary);
  }

  .elementor-widget-counter .elementor-counter-number-wrapper {
    color: var(--e-global-color-primary);
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-counter .elementor-counter-title {
    color: var(--e-global-color-secondary);
    font-family: var(--e-global-typography-secondary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-secondary-font-weight);
  }

  .elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar {
    background-color: var(--e-global-color-primary);
  }

  .elementor-widget-progress .elementor-title {
    color: var(--e-global-color-primary);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-testimonial .elementor-testimonial-content {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-testimonial .elementor-testimonial-name {
    color: var(--e-global-color-primary);
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-testimonial .elementor-testimonial-job {
    color: var(--e-global-color-secondary);
    font-family: var(--e-global-typography-secondary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-secondary-font-weight);
  }

  .elementor-widget-tabs .elementor-tab-title,
  .elementor-widget-tabs .elementor-tab-title a {
    color: var(--e-global-color-primary);
  }

  .elementor-widget-tabs .elementor-tab-title.elementor-active,
  .elementor-widget-tabs .elementor-tab-title.elementor-active a {
    color: var(--e-global-color-accent);
  }

  .elementor-widget-tabs .elementor-tab-title {
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-tabs .elementor-tab-content {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-accordion .elementor-accordion-icon,
  .elementor-widget-accordion .elementor-accordion-title {
    color: var(--e-global-color-primary);
  }

  .elementor-widget-accordion .elementor-accordion-icon svg {
    fill: var(--e-global-color-primary);
  }

  .elementor-widget-accordion .elementor-active .elementor-accordion-icon,
  .elementor-widget-accordion .elementor-active .elementor-accordion-title {
    color: var(--e-global-color-accent);
  }

  .elementor-widget-accordion .elementor-active .elementor-accordion-icon svg {
    fill: var(--e-global-color-accent);
  }

  .elementor-widget-accordion .elementor-accordion-title {
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-accordion .elementor-tab-content {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-toggle .elementor-toggle-title,
  .elementor-widget-toggle .elementor-toggle-icon {
    color: var(--e-global-color-primary);
  }

  .elementor-widget-toggle .elementor-toggle-icon svg {
    fill: var(--e-global-color-primary);
  }

  .elementor-widget-toggle .elementor-tab-title.elementor-active a,
  .elementor-widget-toggle .elementor-tab-title.elementor-active .elementor-toggle-icon {
    color: var(--e-global-color-accent);
  }

  .elementor-widget-toggle .elementor-toggle-title {
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-toggle .elementor-tab-content {
    color: var(--e-global-color-text);
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-alert .elementor-alert-title {
    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
    font-weight: var(--e-global-typography-primary-font-weight);
  }

  .elementor-widget-alert .elementor-alert-description {
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-widget-text-path {
    font-family: var(--e-global-typography-text-font-family), Sans-serif;
    font-weight: var(--e-global-typography-text-font-weight);
  }

  .elementor-3816 .elementor-element.elementor-element-1532357 {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --align-items: center;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 50px;
    --padding-block-end: 0px;
    --padding-inline-start: 20px;
    --padding-inline-end: 20px;
  }

  .elementor-3816 .elementor-element.elementor-element-b8d61b9 {
    --display: flex;
    --min-height: 600px;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --justify-content: center;
    --align-items: center;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-b8d61b9:not(.elementor-motion-effects-element-type-background),
  .elementor-3816 .elementor-element.elementor-element-b8d61b9>.elementor-motion-effects-container>.elementor-motion-effects-layer {
    background-image: url("{{asset('frontend')}}/wp-content/uploads/2023/10/menu-img1.jpg"); 
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .elementor-3816 .elementor-element.elementor-element-b8d61b9,
  .elementor-3816 .elementor-element.elementor-element-b8d61b9::before {
    --border-transition: 0.3s;
  }

  .elementor-3816 .elementor-element.elementor-element-c3e649e.elementor-element {
    --align-self: center;
  }

  .elementor-3816 .elementor-element.elementor-element-a6e207a {
    --display: flex;
    --flex-direction: row;
    --container-widget-width: initial;
    --container-widget-height: 100%;
    --container-widget-flex-grow: 1;
    --container-widget-align-self: stretch;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 140px;
    --padding-block-end: 140px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-ec09a62 {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --justify-content: flex-start;
    --align-items: center;
    --gap: 25px 0px;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 100px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-01eba16 {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-41cab5f {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-487b2ac {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --justify-content: center;
    --align-items: center;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0%;
    --padding-block-end: 0%;
    --padding-inline-start: 0%;
    --padding-inline-end: 5%;
  }

  .elementor-3816 .elementor-element.elementor-element-95b44ad {
    width: var(--container-widget-width, 482px);
    max-width: 482px;
    --container-widget-width: 482px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-9e062af {
    --display: flex;
    --min-height: 815px;
    --flex-direction: row;
    --container-widget-width: initial;
    --container-widget-height: 100%;
    --container-widget-flex-grow: 1;
    --container-widget-align-self: stretch;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-eb6e3ac {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --justify-content: flex-start;
    --align-items: center;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0%;
    --padding-block-end: 0%;
    --padding-inline-start: 3%;
    --padding-inline-end: 0%;
  }

  .elementor-3816 .elementor-element.elementor-element-b96a246 {
    width: var(--container-widget-width, 482px);
    max-width: 482px;
    --container-widget-width: 482px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-f64f3a3 {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --justify-content: flex-end;
    --align-items: center;
    --gap: 25px 0px;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0%;
    --padding-block-end: 1%;
    --padding-inline-start: 0%;
    --padding-inline-end: 3%;
  }

  .elementor-3816 .elementor-element.elementor-element-872a9a4 {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-c0dc4f0 {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-71bab8d {
    --display: flex;
    --flex-direction: row-reverse;
    --container-widget-width: initial;
    --container-widget-height: 100%;
    --container-widget-flex-grow: 1;
    --container-widget-align-self: stretch;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 140px;
    --padding-block-end: 140px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-134c900 {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --align-items: center;
    --gap: 95px 0px;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0%;
    --padding-block-end: 0%;
    --padding-inline-start: 0%;
    --padding-inline-end: 3%;
  }

  .elementor-3816 .elementor-element.elementor-element-9147e56 {
    --display: flex;
    --align-items: center;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-9147e56.e-con {
    --align-self: center;
  }

  .elementor-3816 .elementor-element.elementor-element-2004468 {
    width: var(--container-widget-width, 380px);
    max-width: 380px;
    --container-widget-width: 380px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-ad1f2fc {
    --display: flex;
    --align-items: center;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-b581a27 {
    width: var(--container-widget-width, 482px);
    max-width: 482px;
    --container-widget-width: 482px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-5cf85cd {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --justify-content: center;
    --align-items: center;
    --gap: 25px 0px;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 10px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-b3edef9 {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-a3f6879 {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-e96a5ed {
    --display: flex;
    --min-height: 815px;
    --flex-direction: row;
    --container-widget-width: initial;
    --container-widget-height: 100%;
    --container-widget-flex-grow: 1;
    --container-widget-align-self: stretch;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0px;
    --padding-block-end: 130px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-7df6b61 {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --align-items: center;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0%;
    --padding-block-end: 0%;
    --padding-inline-start: 2%;
    --padding-inline-end: 0%;
  }

  .elementor-3816 .elementor-element.elementor-element-5db4995 {
    width: var(--container-widget-width, 482px);
    max-width: 482px;
    --container-widget-width: 482px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-2b11e41 {
    --display: flex;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --align-items: center;
    --gap: 25px 0px;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 120px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-777cd20 {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-c01f363 {
    width: var(--container-widget-width, 430px);
    max-width: 430px;
    --container-widget-width: 430px;
    --container-widget-flex-grow: 0;
  }

  .elementor-3816 .elementor-element.elementor-element-f395211 {
    --display: flex;
    --min-height: 500px;
    --flex-direction: column;
    --container-widget-width: calc((1 - var(--container-widget-flex-grow)) * 100%);
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --justify-content: center;
    --align-items: center;
    --gap: 75px 0px;
    --background-transition: 0.3s;
    --margin-block-start: 0px;
    --margin-block-end: 0px;
    --margin-inline-start: 0px;
    --margin-inline-end: 0px;
    --padding-block-start: 0px;
    --padding-block-end: 0px;
    --padding-inline-start: 0px;
    --padding-inline-end: 0px;
  }

  .elementor-3816 .elementor-element.elementor-element-f395211:not(.elementor-motion-effects-element-type-background),
  .elementor-3816 .elementor-element.elementor-element-f395211>.elementor-motion-effects-container>.elementor-motion-effects-layer {
    background-image: url("../wp-content/uploads/2023/10/menu-img7.jpg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .elementor-3816 .elementor-element.elementor-element-f395211,
  .elementor-3816 .elementor-element.elementor-element-f395211::before {
    --border-transition: 0.3s;
  }

  .elementor-3816 .elementor-element.elementor-element-749895f {
    width: 100%;
    max-width: 100%;
  }

  .elementor-3816 .elementor-element.elementor-element-8859b71 {
    width: var(--container-widget-width, 66%);
    max-width: 66%;
    --container-widget-width: 66%;
    --container-widget-flex-grow: 0;
  }

  @media(max-width:1514px) {
    .elementor-3816 .elementor-element.elementor-element-b8d61b9 {
      --min-height: 470px;
    }

    .elementor-3816 .elementor-element.elementor-element-f395211 {
      --min-height: 400px;
    }
  }

  @media(max-width:1201px) {
    .elementor-3816 .elementor-element.elementor-element-1532357 {
      --padding-block-start: 0px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-b8d61b9 {
      --min-height: 350px;
    }

    .elementor-3816 .elementor-element.elementor-element-a6e207a {
      --gap: 0px 130px;
    }

    .elementor-3816 .elementor-element.elementor-element-ec09a62 {
      --padding-block-start: 50px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-01eba16 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-41cab5f {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-487b2ac {
      --padding-block-start: 0%;
      --padding-block-end: 0%;
      --padding-inline-start: 0%;
      --padding-inline-end: 0%;
    }

    .elementor-3816 .elementor-element.elementor-element-9e062af {
      --min-height: 730px;
      --gap: 0px 130px;
    }

    .elementor-3816 .elementor-element.elementor-element-eb6e3ac {
      --padding-block-start: 0%;
      --padding-block-end: 0%;
      --padding-inline-start: 0%;
      --padding-inline-end: 0%;
    }

    .elementor-3816 .elementor-element.elementor-element-f64f3a3 {
      --justify-content: flex-end;
      --padding-block-start: 0%;
      --padding-block-end: 0%;
      --padding-inline-start: 0%;
      --padding-inline-end: 0%;
    }

    .elementor-3816 .elementor-element.elementor-element-872a9a4 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-c0dc4f0 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-71bab8d {
      --gap: 0px 130px;
    }

    .elementor-3816 .elementor-element.elementor-element-134c900 {
      --padding-block-start: 0%;
      --padding-block-end: 0%;
      --padding-inline-start: 0%;
      --padding-inline-end: 0%;
    }

    .elementor-3816 .elementor-element.elementor-element-2004468 {
      width: var(--container-widget-width, 70%);
      max-width: 70%;
      --container-widget-width: 70%;
      --container-widget-flex-grow: 0;
    }

    .elementor-3816 .elementor-element.elementor-element-b581a27 {
      --container-widget-width: 85%;
      --container-widget-flex-grow: 0;
      width: var(--container-widget-width, 85%);
      max-width: 85%;
    }

    .elementor-3816 .elementor-element.elementor-element-5cf85cd {
      --padding-block-start: 0px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-b3edef9 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-a3f6879 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-e96a5ed {
      --min-height: 730px;
      --gap: 0px 130px;
    }

    .elementor-3816 .elementor-element.elementor-element-7df6b61 {
      --padding-block-start: 0%;
      --padding-block-end: 0%;
      --padding-inline-start: 0%;
      --padding-inline-end: 0%;
    }

    .elementor-3816 .elementor-element.elementor-element-2b11e41 {
      --padding-block-start: 80px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-777cd20 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-c01f363 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-f395211 {
      --min-height: 400px;
    }
  }

  @media(max-width:1024px) {
    .elementor-3816 .elementor-element.elementor-element-a6e207a {
      --gap: 0px 110px;
      --padding-block-start: 125px;
      --padding-block-end: 140px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-9e062af {
      --min-height: 0px;
      --gap: 0px 110px;
    }

    .elementor-3816 .elementor-element.elementor-element-f64f3a3 {
      --padding-block-start: 50px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-71bab8d {
      --gap: 0px 110px;
    }

    .elementor-3816 .elementor-element.elementor-element-e96a5ed {
      --min-height: 0px;
      --gap: 0px 110px;
    }

    .elementor-3816 .elementor-element.elementor-element-8859b71 {
      --container-widget-width: 80%;
      --container-widget-flex-grow: 0;
      width: var(--container-widget-width, 80%);
      max-width: 80%;
    }
  }

  @media(max-width:880px) {
    .elementor-3816 .elementor-element.elementor-element-a6e207a {
      --gap: 0px 60px;
      --padding-block-start: 80px;
      --padding-block-end: 140px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-9e062af {
      --min-height: 0px;
      --gap: 0px 60px;
    }

    .elementor-3816 .elementor-element.elementor-element-71bab8d {
      --gap: 0px 60px;
    }

    .elementor-3816 .elementor-element.elementor-element-2004468 {
      --container-widget-width: 90%;
      --container-widget-flex-grow: 0;
      width: var(--container-widget-width, 90%);
      max-width: 90%;
    }

    .elementor-3816 .elementor-element.elementor-element-b581a27 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-e96a5ed {
      --min-height: 0px;
      --gap: 0px 60px;
    }

    .elementor-3816 .elementor-element.elementor-element-f395211 {
      --padding-block-start: 0%;
      --padding-block-end: 0%;
      --padding-inline-start: 7%;
      --padding-inline-end: 7%;
    }

    .elementor-3816 .elementor-element.elementor-element-8859b71 {
      width: 100%;
      max-width: 100%;
    }
  }

  @media(max-width:680px) {
    .elementor-3816 .elementor-element.elementor-element-1532357 {
      --padding-block-start: 0px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-a6e207a {
      --gap: 60px 0px;
      --padding-block-start: 90px;
      --padding-block-end: 90px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-ec09a62 {
      --padding-block-start: 0px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-9e062af {
      --min-height: 0px;
      --flex-direction: column-reverse;
      --container-widget-width: 100%;
      --container-widget-height: initial;
      --container-widget-flex-grow: 0;
      --container-widget-align-self: initial;
      --gap: 60px 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-f64f3a3 {
      --padding-block-start: 0px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-71bab8d {
      --flex-direction: column-reverse;
      --container-widget-width: 100%;
      --container-widget-height: initial;
      --container-widget-flex-grow: 0;
      --container-widget-align-self: initial;
      --gap: 60px 0px;
      --padding-block-start: 90px;
      --padding-block-end: 90px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-134c900 {
      --gap: 50px 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-2004468 {
      width: 100%;
      max-width: 100%;
    }

    .elementor-3816 .elementor-element.elementor-element-e96a5ed {
      --min-height: 0px;
      --flex-direction: column-reverse;
      --container-widget-width: 100%;
      --container-widget-height: initial;
      --container-widget-flex-grow: 0;
      --container-widget-align-self: initial;
      --gap: 60px 0px;
      --padding-block-start: 0px;
      --padding-block-end: 100px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-2b11e41 {
      --padding-block-start: 0px;
      --padding-block-end: 0px;
      --padding-inline-start: 0px;
      --padding-inline-end: 0px;
    }

    .elementor-3816 .elementor-element.elementor-element-f395211 {
      --min-height: 600px;
      --gap: 60px 0px;
      --padding-block-start: 10%;
      --padding-block-end: 10%;
      --padding-inline-start: 7%;
      --padding-inline-end: 7%;
    }

    .elementor-3816 .elementor-element.elementor-element-8859b71 {
      width: 100%;
      max-width: 100%;
    }
  }

  @media(min-width:681px) {
    .elementor-3816 .elementor-element.elementor-element-ec09a62 {
      --width: 50%;
    }

    .elementor-3816 .elementor-element.elementor-element-487b2ac {
      --width: 50%;
    }

    .elementor-3816 .elementor-element.elementor-element-eb6e3ac {
      --width: 50%;
    }

    .elementor-3816 .elementor-element.elementor-element-f64f3a3 {
      --width: 50%;
    }

    .elementor-3816 .elementor-element.elementor-element-134c900 {
      --width: 50%;
    }

    .elementor-3816 .elementor-element.elementor-element-5cf85cd {
      --width: 50%;
    }

    .elementor-3816 .elementor-element.elementor-element-7df6b61 {
      --width: 50%;
    }

    .elementor-3816 .elementor-element.elementor-element-2b11e41 {
      --width: 50%;
    }
  }

  @media(max-width:880px) and (min-width:681px) {
    .elementor-3816 .elementor-element.elementor-element-ec09a62 {
      --width: 60%;
    }

    .elementor-3816 .elementor-element.elementor-element-487b2ac {
      --width: 40%;
    }

    .elementor-3816 .elementor-element.elementor-element-eb6e3ac {
      --width: 40%;
    }

    .elementor-3816 .elementor-element.elementor-element-f64f3a3 {
      --width: 60%;
    }

    .elementor-3816 .elementor-element.elementor-element-134c900 {
      --width: 40%;
    }

    .elementor-3816 .elementor-element.elementor-element-5cf85cd {
      --width: 60%;
    }

    .elementor-3816 .elementor-element.elementor-element-7df6b61 {
      --width: 40%;
    }

    .elementor-3816 .elementor-element.elementor-element-2b11e41 {
      --width: 60%;
    }
  }
</style>
<div class="qodef-grid-inner">
  <div class="qodef-grid-item qodef-page-content-section qodef-col--content">
    <div data-elementor-type="wp-page" data-elementor-id="3816" class="elementor elementor-3816">
      <div class="elementor-element elementor-element-1532357 e-con-full e-flex e-con e-parent" data-id="1532357" data-element_type="container" data-core-v316-plus="true">
        <div class="elementor-element elementor-element-b8d61b9 e-con-full e-flex e-con e-child" data-id="b8d61b9" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
          <div class="elementor-element elementor-element-c3e649e elementor-widget elementor-widget-fidalgo_core_info_section" data-id="c3e649e" data-element_type="widget" data-widget_type="fidalgo_core_info_section.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-info-section qodef-layout--background-text  qodef-background-text-pos--top-left ">
                <div class="qodef-m-info">
                  <div class="qodef-m-title-holder">
                    <h1 class="qodef-m-title"> our menu </h1>
                  </div>
                  <div class="qodef-m-text-holder" style="margin-top: 10px">
                    <div class="qodef-m-text-info">
                      <div class="qodef-m-text">
                        <h6 style="text-align: center">À LA CARTE MENU</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="elementor-element elementor-element-a6e207a e-con-full qodef-elementor-content-grid e-flex e-con e-parent" data-id="a6e207a" data-element_type="container" data-core-v316-plus="true">
        <div class="elementor-element elementor-element-ec09a62 e-con-full e-flex e-con e-child" data-id="ec09a62" data-element_type="container">
          <div class="elementor-element elementor-element-01eba16 elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_section_title" data-id="01eba16" data-element_type="widget" data-widget_type="fidalgo_core_section_title.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-section-title qodef-alignment--left  qodef-decoration--enabled">
                <h3 class="qodef-m-title"> APPETIZERS </h3>
              </div>
            </div>
          </div>
          <div class="elementor-element elementor-element-41cab5f elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_restaurant_menu_list" data-id="41cab5f" data-element_type="widget" data-widget_type="fidalgo_core_restaurant_menu_list.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-restaurant-menu-list    qodef-skin--default qodef-grid qodef-layout--columns   qodef-vertical-gutter--custom qodef-col-num--1 qodef-item-layout--side-by-side   qodef-responsive--custom qodef-col-num--1512--1 qodef-col-num--1368--1 qodef-col-num--1200--1 qodef-col-num--1024--1 qodef-col-num--880--1 qodef-col-num--680--1" style="--qode-vertical-gutter-custom: 15px;--qode-vertical-gutter-custom-1512: 15px;--qode-vertical-gutter-custom-1200: 15px;--qode-vertical-gutter-custom-880: 15px">
                <div class="qodef-grid-inner">
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Cheesy Garlic Bread</h5>
                          <div class="qodef-e-price">$59</div>
                        </div>
                        <p class="qodef-e-description"> Red onion marmelade, garlic foccacia bread, grilled figs </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Combination Platter</h5>
                          <div class="qodef-e-price">$78</div>
                        </div>
                        <p class="qodef-e-description"> Calamari, stuffed mushroom caps, clams casino, and bruschetta </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Antipasto</h5>
                          <div class="qodef-e-price">$80</div>
                        </div>
                        <p class="qodef-e-description"> Chef&#039;s selection of seasonal meats, cheeses and accoutrements </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Mushroom Caps</h5>
                          <div class="qodef-e-price">$55</div>
                        </div>
                        <p class="qodef-e-description"> Mushrooms stuffed with a Ritz cracker and vegetable stuffing </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="elementor-element elementor-element-487b2ac e-con-full e-flex e-con e-child" data-id="487b2ac" data-element_type="container">
          <div class="elementor-element elementor-element-95b44ad elementor-widget__width-initial elementor-widget elementor-widget-fidalgo_core_single_image" data-id="95b44ad" data-element_type="widget" data-widget_type="fidalgo_core_single_image.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-single-image qodef-layout--default   qodef--border-radius   qodef--has-appear" style="--qode-border-radius: 250px 250px 0px 0px">
                <div class="qodef-m-image">
                  <img loading="lazy" decoding="async" width="900" height="1352" src="../wp-content/uploads/2023/10/menu-img2.jpg" class="attachment-full size-full" alt="a" srcset="https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img2.jpg 900w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img2-200x300.jpg 200w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img2-682x1024.jpg 682w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img2-768x1154.jpg 768w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img2-600x901.jpg 600w" sizes="(max-width: 900px) 100vw, 900px" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="elementor-element elementor-element-9e062af e-con-full qodef-elementor-content-grid e-flex e-con e-parent" data-id="9e062af" data-element_type="container" data-core-v316-plus="true">
        <div class="elementor-element elementor-element-eb6e3ac e-con-full e-flex e-con e-child" data-id="eb6e3ac" data-element_type="container">
          <div class="elementor-element elementor-element-b96a246 elementor-widget__width-initial elementor-widget elementor-widget-fidalgo_core_single_image" data-id="b96a246" data-element_type="widget" data-widget_type="fidalgo_core_single_image.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-single-image qodef-layout--default   qodef--border-radius   qodef--has-appear" style="--qode-border-radius: 0px 200px 0px 0px">
                <div class="qodef-m-image">
                  <img loading="lazy" decoding="async" width="900" height="1404" src="../wp-content/uploads/2023/10/menu-img3.jpg" class="attachment-full size-full" alt="a" srcset="https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img3.jpg 900w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img3-192x300.jpg 192w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img3-656x1024.jpg 656w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img3-768x1198.jpg 768w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img3-600x936.jpg 600w" sizes="(max-width: 900px) 100vw, 900px" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="elementor-element elementor-element-f64f3a3 e-con-full e-flex e-con e-child" data-id="f64f3a3" data-element_type="container">
          <div class="elementor-element elementor-element-872a9a4 elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_section_title" data-id="872a9a4" data-element_type="widget" data-widget_type="fidalgo_core_section_title.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-section-title qodef-alignment--left  qodef-decoration--enabled">
                <h3 class="qodef-m-title"> MAIN COURSES </h3>
              </div>
            </div>
          </div>
          <div class="elementor-element elementor-element-c0dc4f0 elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_restaurant_menu_list" data-id="c0dc4f0" data-element_type="widget" data-widget_type="fidalgo_core_restaurant_menu_list.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-restaurant-menu-list    qodef-skin--default qodef-grid qodef-layout--columns   qodef-vertical-gutter--custom qodef-col-num--1 qodef-item-layout--side-by-side   qodef-responsive--custom qodef-col-num--1512--1 qodef-col-num--1368--1 qodef-col-num--1200--1 qodef-col-num--1024--1 qodef-col-num--880--1 qodef-col-num--680--1" style="--qode-vertical-gutter-custom: 15px;--qode-vertical-gutter-custom-1512: 15px;--qode-vertical-gutter-custom-1200: 15px;--qode-vertical-gutter-custom-880: 15px">
                <div class="qodef-grid-inner">
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Herbed Lamb Steaks</h5>
                          <div class="qodef-e-price">$89</div>
                        </div>
                        <p class="qodef-e-description"> Grilled lamb cutlets, pomegranate glaze, butternut squash </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Tartare De Boeuf</h5>
                          <div class="qodef-e-price">$90</div>
                        </div>
                        <p class="qodef-e-description"> hand cut 100% beef steak tartar with french baguette </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Classic Cesar Salad</h5>
                          <div class="qodef-e-price">$60</div>
                        </div>
                        <p class="qodef-e-description"> cold iceberg salad with avocado and fresh aromatic herbs </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Dumplings</h5>
                          <div class="qodef-e-price">$76</div>
                        </div>
                        <p class="qodef-e-description"> homemade beef soup with dumplings </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Foie Gras</h5>
                          <div class="qodef-e-price">$63</div>
                        </div>
                        <p class="qodef-e-description"> Foie gras terrine served withhomemade toasted brioche </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="elementor-element elementor-element-71bab8d e-con-full qodef-elementor-content-grid e-flex e-con e-parent" data-id="71bab8d" data-element_type="container" data-core-v316-plus="true">
        <div class="elementor-element elementor-element-134c900 e-con-full e-flex e-con e-child" data-id="134c900" data-element_type="container">
          <div class="elementor-element elementor-element-9147e56 e-con-full e-flex e-con e-child" data-id="9147e56" data-element_type="container">
            <div class="elementor-element elementor-element-2004468 elementor-widget__width-initial elementor-widget-tablet_extra__width-initial elementor-widget-mobile__width-inherit elementor-widget elementor-widget-fidalgo_core_single_image" data-id="2004468" data-element_type="widget" data-widget_type="fidalgo_core_single_image.default">
              <div class="elementor-widget-container">
                <div class="qodef-shortcode qodef-m  qodef-single-image qodef-layout--default   qodef--border-radius   qodef--has-appear" style="--qode-border-radius: 193px">
                  <div class="qodef-m-image">
                    <img loading="lazy" decoding="async" width="600" height="740" src="../wp-content/uploads/2023/10/menu-img4.jpg" class="attachment-full size-full" alt="a" srcset="https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img4.jpg 600w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img4-243x300.jpg 243w" sizes="(max-width: 600px) 100vw, 600px" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="elementor-element elementor-element-ad1f2fc e-con-full e-flex e-con e-child" data-id="ad1f2fc" data-element_type="container">
            <div class="elementor-element elementor-element-b581a27 elementor-widget__width-initial elementor-widget-mobile_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_single_image" data-id="b581a27" data-element_type="widget" data-widget_type="fidalgo_core_single_image.default">
              <div class="elementor-widget-container">
                <div class="qodef-shortcode qodef-m  qodef-single-image qodef-layout--default      qodef--has-appear">
                  <div class="qodef-m-image">
                    <img loading="lazy" decoding="async" width="600" height="402" src="../wp-content/uploads/2023/10/menu-img5.jpg" class="attachment-full size-full" alt="a" srcset="https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img5.jpg 600w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img5-300x201.jpg 300w" sizes="(max-width: 600px) 100vw, 600px" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="elementor-element elementor-element-5cf85cd e-con-full e-flex e-con e-child" data-id="5cf85cd" data-element_type="container">
          <div class="elementor-element elementor-element-b3edef9 elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_section_title" data-id="b3edef9" data-element_type="widget" data-widget_type="fidalgo_core_section_title.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-section-title qodef-alignment--left  qodef-decoration--enabled">
                <h3 class="qodef-m-title"> desserts </h3>
              </div>
            </div>
          </div>
          <div class="elementor-element elementor-element-a3f6879 elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_restaurant_menu_list" data-id="a3f6879" data-element_type="widget" data-widget_type="fidalgo_core_restaurant_menu_list.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-restaurant-menu-list    qodef-skin--default qodef-grid qodef-layout--columns   qodef-vertical-gutter--custom qodef-col-num--1 qodef-item-layout--side-by-side   qodef-responsive--custom qodef-col-num--1512--1 qodef-col-num--1368--1 qodef-col-num--1200--1 qodef-col-num--1024--1 qodef-col-num--880--1 qodef-col-num--680--1" style="--qode-vertical-gutter-custom: 15px;--qode-vertical-gutter-custom-1512: 15px;--qode-vertical-gutter-custom-1200: 15px;--qode-vertical-gutter-custom-880: 15px">
                <div class="qodef-grid-inner">
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Chocolate Divine</h5>
                          <div class="qodef-e-price">$36</div>
                        </div>
                        <p class="qodef-e-description"> Chocolate brownie, Venetian chocolate ice cream, chocolate syrup, bananas &amp; whipped cream </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Apple Caramel Crumble</h5>
                          <div class="qodef-e-price">$41</div>
                        </div>
                        <p class="qodef-e-description"> Warm apple &amp; cinnamon bark compote over French vanilla ice cream </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Blueberry Shortcake</h5>
                          <div class="qodef-e-price">$33</div>
                        </div>
                        <p class="qodef-e-description"> Cheesecake bites and wild blueberry compote over French vanilla ice cream </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Carrot Cake</h5>
                          <div class="qodef-e-price">$35</div>
                        </div>
                        <p class="qodef-e-description"> Covered in butter cream icing and topped with walnuts </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Hummingbird Cake</h5>
                          <div class="qodef-e-price">$45</div>
                        </div>
                        <p class="qodef-e-description"> Toasted coconut, pineapple and banana combine for a delicious cake flavour </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="elementor-element elementor-element-e96a5ed e-con-full qodef-elementor-content-grid e-flex e-con e-parent" data-id="e96a5ed" data-element_type="container" data-core-v316-plus="true">
        <div class="elementor-element elementor-element-7df6b61 e-con-full e-flex e-con e-child" data-id="7df6b61" data-element_type="container">
          <div class="elementor-element elementor-element-5db4995 elementor-widget__width-initial elementor-widget elementor-widget-fidalgo_core_single_image" data-id="5db4995" data-element_type="widget" data-widget_type="fidalgo_core_single_image.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-single-image qodef-layout--default   qodef--border-radius   qodef--has-appear" style="--qode-border-radius: 0px 0px 200px 0px">
                <div class="qodef-m-image">
                  <img loading="lazy" decoding="async" width="900" height="1404" src="../wp-content/uploads/2023/10/menu-img6.jpg" class="attachment-full size-full" alt="a" srcset="https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img6.jpg 900w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img6-192x300.jpg 192w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img6-656x1024.jpg 656w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img6-768x1198.jpg 768w, https://fidalgo.qodeinteractive.com/wp-content/uploads/2023/10/menu-img6-600x936.jpg 600w" sizes="(max-width: 900px) 100vw, 900px" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="elementor-element elementor-element-2b11e41 e-con-full e-flex e-con e-child" data-id="2b11e41" data-element_type="container">
          <div class="elementor-element elementor-element-777cd20 elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_section_title" data-id="777cd20" data-element_type="widget" data-widget_type="fidalgo_core_section_title.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-section-title qodef-alignment--left  qodef-decoration--enabled">
                <h3 class="qodef-m-title"> drinks </h3>
              </div>
            </div>
          </div>
          <div class="elementor-element elementor-element-c01f363 elementor-widget__width-initial elementor-widget-tablet_extra__width-inherit elementor-widget elementor-widget-fidalgo_core_restaurant_menu_list" data-id="c01f363" data-element_type="widget" data-widget_type="fidalgo_core_restaurant_menu_list.default">
            <div class="elementor-widget-container">
              <div class="qodef-shortcode qodef-m  qodef-restaurant-menu-list    qodef-skin--default qodef-grid qodef-layout--columns   qodef-vertical-gutter--custom qodef-col-num--1 qodef-item-layout--side-by-side   qodef-responsive--custom qodef-col-num--1512--1 qodef-col-num--1368--1 qodef-col-num--1200--1 qodef-col-num--1024--1 qodef-col-num--880--1 qodef-col-num--680--1" style="--qode-vertical-gutter-custom: 15px;--qode-vertical-gutter-custom-1512: 15px;--qode-vertical-gutter-custom-1200: 15px;--qode-vertical-gutter-custom-880: 15px">
                <div class="qodef-grid-inner">
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Breakbeet</h5>
                          <div class="qodef-e-price">$32</div>
                        </div>
                        <p class="qodef-e-description"> russian standard platinum vodka, raspberry &amp; beetroot cordial, lemon, spicy ginger beer </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Japanese Fizz</h5>
                          <div class="qodef-e-price">$26</div>
                        </div>
                        <p class="qodef-e-description"> lemongrass infused russian standard platinum vodka, lime, jasmin green tea &amp; matcha soda </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Sgroppino</h5>
                          <div class="qodef-e-price">$37</div>
                        </div>
                        <p class="qodef-e-description"> italicus rosolio di bergamotto, lemon sorbet, prosecco carpe noctem </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Mango Dusk</h5>
                          <div class="qodef-e-price">$37</div>
                        </div>
                        <p class="qodef-e-description"> lemongrass infused russian standard platinum vodka, lime, jasmin green tea &amp; matcha soda </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Bloody Orange</h5>
                          <div class="qodef-e-price">$37</div>
                        </div>
                        <p class="qodef-e-description"> russian standard platinum vodka, raspberry &amp; beetroot cordial, lemon, spicy ginger beer </p>
                      </div>
                    </div>
                  </div>
                  <div class="qodef-e qodef-grid-item ">
                    <div class="qodef-e-inner">
                      <div class="qodef-e-content">
                        <div class="qodef-e-heading">
                          <h5 class="qodef-e-title"> Pineapple Sunrise</h5>
                          <div class="qodef-e-price">$35</div>
                        </div>
                        <p class="qodef-e-description"> lemongrass infused russian standard platinum vodka, lime, jasmin green tea &amp; matcha soda </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="elementor-element elementor-element-f395211 e-con-full e-flex e-con e-parent" data-id="f395211" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-core-v316-plus="true">
        <div class="elementor-element elementor-element-749895f elementor-widget__width-inherit elementor-widget elementor-widget-fidalgo_core_section_title" data-id="749895f" data-element_type="widget" data-widget_type="fidalgo_core_section_title.default">
          <div class="elementor-widget-container">
            <div class="qodef-shortcode qodef-m  qodef-section-title qodef-alignment--center  ">
              <h2 class="qodef-m-title"> book a table </h2>
            </div>
          </div>
        </div>
        <div class="elementor-element elementor-element-8859b71 elementor-widget__width-initial elementor-widget-mobile_extra__width-inherit elementor-widget-mobile__width-inherit elementor-widget elementor-widget-fidalgo_core_reservation_form" data-id="8859b71" data-element_type="widget" data-widget_type="fidalgo_core_reservation_form.default">
          <div class="elementor-widget-container">
            <div class="qodef-shortcode qodef-m  qodef-reservation-form qodef-layout--inline">
              <form class="qodef-m-inner" target="_blank" action="https://www.opentable.com/restref/client/">
                <input type="hidden" name="rid" class="rid" value="1">
                <input type="hidden" name="restref" class="restref" value="1">
                <div class="qodef-m-field qodef-m-field-people">
                  <select name="partysize" class="qodef-m-people">
                    <option value="1">1 Person</option>
                    <option value="2">2 People</option>
                    <option value="3">3 People</option>
                    <option value="4">4 People</option>
                    <option value="5">5 People</option>
                    <option value="6">6 People</option>
                    <option value="7">7 People</option>
                    <option value="8">8 People</option>
                    <option value="9">9 People</option>
                    <option value="10">10 People</option>
                  </select>
                </div>
                <div class="qodef-m-field qodef-m-field-date">
                  <input type="text" value="25/10/2023" class="qodef-m-date" name="date">
                  <svg class="qodef-svg--angle-down qodef-m-icon-arrow qodef-m-date-toggle" xmlns="http://www.w3.org/2000/svg" width="10.121" height="5.811" viewBox="0 0 10.121 5.811">
                    <path fill="none" stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="1.5" d="m1.061 1.061 4 4 4-4" />
                  </svg>
                </div>
                <div class="qodef-m-field qodef-m-field-time">
                  <select name="time" class="qodef-m-time">
                    <option value="00:30">00:30 am</option>
                    <option value="01:00">01:00 am</option>
                    <option value="01:30">01:30 am</option>
                    <option value="02:00">02:00 am</option>
                    <option value="02:30">02:30 am</option>
                    <option value="03:00">03:00 am</option>
                    <option value="03:30">03:30 am</option>
                    <option value="04:00">04:00 am</option>
                    <option value="04:30">04:30 am</option>
                    <option value="05:00">05:00 am</option>
                    <option value="05:30">05:30 am</option>
                    <option value="06:00">06:00 am</option>
                    <option value="06:30">06:30 am</option>
                    <option value="07:00">07:00 am</option>
                    <option value="07:30">07:30 am</option>
                    <option value="08:00">08:00 am</option>
                    <option value="08:30">08:30 am</option>
                    <option value="09:00">09:00 am</option>
                    <option value="09:30">09:30 am</option>
                    <option value="10:00">10:00 am</option>
                    <option value="10:30">10:30 am</option>
                    <option value="11:00" selected>11:00 am</option>
                    <option value="11:30">11:30 am</option>
                    <option value="12:00">12:00 pm</option>
                    <option value="12:30">12:30 pm</option>
                    <option value="13:00">01:00 pm</option>
                    <option value="13:30">01:30 pm</option>
                    <option value="14:00">02:00 pm</option>
                    <option value="14:30">02:30 pm</option>
                    <option value="15:00">03:00 pm</option>
                    <option value="15:30">03:30 pm</option>
                    <option value="16:00">04:00 pm</option>
                    <option value="16:30">04:30 pm</option>
                    <option value="17:00">05:00 pm</option>
                    <option value="17:30">05:30 pm</option>
                    <option value="18:00">06:00 pm</option>
                    <option value="18:30">06:30 pm</option>
                    <option value="19:00">07:00 pm</option>
                    <option value="19:30">07:30 pm</option>
                    <option value="20:00">08:00 pm</option>
                    <option value="20:30">08:30 pm</option>
                    <option value="21:00">09:00 pm</option>
                    <option value="21:30">09:30 pm</option>
                    <option value="22:00">10:00 pm</option>
                    <option value="22:30">10:30 pm</option>
                    <option value="23:00">11:00 pm</option>
                    <option value="23:30">11:30 pm</option>
                    <option value="24:00">12:00 pm</option>
                  </select>
                </div>
                <div class="qodef-m-field qodef-m-field-book">
                  <button type="submit" class="qodef-shortcode qodef-m  qodef-button qodef-layout--outlined qodef-size--full ">
                    <span class="qodef-btn-text">Book now</span>
                  </button>
                </div>
                <p class="qodef-m-copyright">*Powered by OpenTable</p>
                <input type="hidden" name="datetime" class="datetime" value />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection