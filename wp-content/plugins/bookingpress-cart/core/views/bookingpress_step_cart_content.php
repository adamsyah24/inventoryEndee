<div class="bpa-front-tabs--panel-body" :class="[bookingpress_current_tab == 'cart' ? ' __bpa-is-active' : '']">
    <div class="bpa-front-default-card">
        <div class="bpa-front-dc--body">
            <el-row>
                <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                    <div class="bpa-front-module-container bpa-front-module--cart">
                        <el-row type="flex" class="bpa-fmc--head">
                            <el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-fmc--left-heading">
                                <div class="bpa-front-module-heading">{{cart_heading_title}}<span class="bpa-fmc--head-counter">{{ appointment_step_form_data.cart_items.length }} {{cart_item_title}}</span></div>
                            </el-col>
                            <el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-fmc--right-btn">
                                <?php if(!$bpa_not_allow_add_more_cart_service) { ?>
                                    <el-button :class="(typeof appointment_step_form_data.is_waiting_list  == 'undefined' || appointment_step_form_data.is_waiting_list == false)?'bpa-front-btn bpa-front-btn__medium':'bpa-front-btn bpa-front-btn__medium __bpa-is-disabled'" @click="(typeof appointment_step_form_data.is_waiting_list  == 'undefined' || appointment_step_form_data.is_waiting_list == false)?bookingpress_add_more_service_to_cart():''">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/></svg>
                                        {{cart_add_service_button_label}}
                                    </el-button>
                                <?php } ?>
                            </el-col>
                        </el-row>
                        <el-row class="bpa-cart-module-body--lg">
                            <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                                <div class="bpa-fmc--cart-items-wrap">
                                    <div class="bpa-cart__item" v-for="(bookingpress_cart_details, index) in appointment_step_form_data.cart_items">
                                        <div class="bpa-cart__item-body" @click="bookingpress_expand_cart_item(index)">
                                            <div class="bpa-ci__service-brief">
                                                <svg class="bpa-ci__expand-icon" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" v-if="bookingpress_cart_details.bookingpress_is_expand == 0">
                                                    <g clip-path="url(#clip0_3161_6717)">
                                                        <path d="M10.0013 5.83268C9.54297 5.83268 9.16797 6.20768 9.16797 6.66602V9.16602H6.66797C6.20964 9.16602 5.83464 9.54102 5.83464 9.99935C5.83464 10.4577 6.20964 10.8327 6.66797 10.8327H9.16797V13.3327C9.16797 13.791 9.54297 14.166 10.0013 14.166C10.4596 14.166 10.8346 13.791 10.8346 13.3327V10.8327H13.3346C13.793 10.8327 14.168 10.4577 14.168 9.99935C14.168 9.54102 13.793 9.16602 13.3346 9.16602H10.8346V6.66602C10.8346 6.20768 10.4596 5.83268 10.0013 5.83268ZM10.0013 1.66602C5.4013 1.66602 1.66797 5.39935 1.66797 9.99935C1.66797 14.5993 5.4013 18.3327 10.0013 18.3327C14.6013 18.3327 18.3346 14.5993 18.3346 9.99935C18.3346 5.39935 14.6013 1.66602 10.0013 1.66602ZM10.0013 16.666C6.3263 16.666 3.33464 13.6743 3.33464 9.99935C3.33464 6.32435 6.3263 3.33268 10.0013 3.33268C13.6763 3.33268 16.668 6.32435 16.668 9.99935C16.668 13.6743 13.6763 16.666 10.0013 16.666Z" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3161_6717">
                                                            <rect width="20" height="20" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg class="bpa-ci__expand-icon" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" v-else>
                                                    <g clip-path="url(#clip0_3161_6718)">
                                                        <path d="M5.83464 9.99935C5.83464 10.4577 6.20964 10.8327 6.66797 10.8327H13.3346C13.793 10.8327 14.168 10.4577 14.168 9.99935C14.168 9.54102 13.793 9.16602 13.3346 9.16602H6.66797C6.20964 9.16602 5.83464 9.54102 5.83464 9.99935ZM10.0013 1.66602C5.4013 1.66602 1.66797 5.39935 1.66797 9.99935C1.66797 14.5993 5.4013 18.3327 10.0013 18.3327C14.6013 18.3327 18.3346 14.5993 18.3346 9.99935C18.3346 5.39935 14.6013 1.66602 10.0013 1.66602ZM10.0013 16.666C6.3263 16.666 3.33464 13.6743 3.33464 9.99935C3.33464 6.32435 6.3263 3.33268 10.0013 3.33268C13.6763 3.33268 16.668 6.32435 16.668 9.99935C16.668 13.6743 13.6763 16.666 10.0013 16.666Z" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3161_6718">
                                                            <rect width="20" height="20" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <div class="bpa-sb--left" v-if="('undefined' == typeof bookingpress_cart_details.use_placeholder || 'false' == bookingpress_cart_details.use_placeholder)"> 
                                                    <img :src="bookingpress_cart_details.img_url" alt="img">
                                                </div>
                                                <div class="bpa-sb--left" v-else> 
                                                    <div class="bpa-front-si__default-img">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13.2 7.07L10.25 11l2.25 3c.33.44.24 1.07-.2 1.4-.44.33-1.07.25-1.4-.2-1.05-1.4-2.31-3.07-3.1-4.14-.4-.53-1.2-.53-1.6 0l-4 5.33c-.49.67-.02 1.61.8 1.61h18c.82 0 1.29-.94.8-1.6l-7-9.33c-.4-.54-1.2-.54-1.6 0z"/></svg>
                                                    </div>
                                                </div>
                                                <div class="bpa-sb--right">
                                                    <div class="bpa-sbr__title">{{ bookingpress_cart_details.bookingpress_service_name }}</div>
                                                </div>
                                            </div>  
                                            <div class="bpa-ci__service-date">
                                                <div class="bpa-ci__service-col-val">{{ bookingpress_cart_details.bookingpress_selected_date | bookingpress_format_date }}</div>
                                            </div>
                                             <div class="bpa-ci__service-time">
                                                <div v-show="bookingpress_cart_details.bookingpress_selected_start_time != '' && bookingpress_cart_details.bookingpress_selected_end_time != ''" class="bpa-ci__service-col-val">{{ bookingpress_cart_details.formatted_start_time }} - {{ bookingpress_cart_details.formatted_end_time }}</div>
                                                <?php do_action('bookingpress_cart_item_list_service_time_after'); ?>
                                            </div>
                                            <div class="bpa-ci__service-price">
                                                <div class="bpa-ci__service-col-val" v-if="'undefined' != typeof bookingpress_is_deposit_payment_activate && 1 == bookingpress_is_deposit_payment_activate">
                                                    <span class="bpa-ci__service-deposit-price-value">{{ bookingpress_cart_details.bookingpress_deposit_price_with_currency }}<span><br/>
                                                    <span class="bpa-ci__service-full-price-value">of {{ bookingpress_cart_details.bookingpress_service_original_price_with_currency }}</span></div>                                            
                                                <div class="bpa-ci__service-col-val" v-else>{{ bookingpress_cart_details.bookingpress_service_original_price_with_currency }}</div>                                            
                                            </div>
                                            <?php if(!$bpa_not_allow_add_more_cart_service) { ?>
                                            <div class="bpa-ci__service-actions">
                                                <div class="bpa-ci__sa-wrap">
                                                    <el-button v-if="(typeof appointment_step_form_data.is_waiting_list  == 'undefined' || appointment_step_form_data.is_waiting_list == false)" class="bpa-front-btn bpa-front-btn--icon-without-box" @click="bookingpress_edit_cart_item(index)">                                                
                                                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_3168_6275)">
                                                                <path d="M2.5 14.5501V17.0835C2.5 17.3168 2.68333 17.5001 2.91667 17.5001H5.45C5.55833 17.5001 5.66667 17.4585 5.74167 17.3751L14.8417 8.28346L11.7167 5.15846L2.625 14.2501C2.54167 14.3335 2.5 14.4335 2.5 14.5501ZM17.2583 5.8668C17.5833 5.5418 17.5833 5.0168 17.2583 4.6918L15.3083 2.7418C14.9833 2.4168 14.4583 2.4168 14.1333 2.7418L12.6083 4.2668L15.7333 7.3918L17.2583 5.8668Z" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_3168_6275">
                                                                    <rect width="20" height="20" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </el-button>
                                                    <el-button class="bpa-front-btn bpa-front-btn--icon-without-box" @click="bookingpress_delete_cart_item(index)">                                                
                                                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_3172_6333)">
                                                                <path d="M17.2411 2.76958C16.7928 2.3213 16.0687 2.3213 15.6204 2.76958L9.99961 8.37889L4.37881 2.75809C3.93053 2.3098 3.20637 2.3098 2.75809 2.75809C2.3098 3.20637 2.3098 3.93053 2.75809 4.37881L8.37889 9.99961L2.75809 15.6204C2.3098 16.0687 2.3098 16.7928 2.75809 17.2411C3.20637 17.6894 3.93053 17.6894 4.37881 17.2411L9.99961 11.6203L15.6204 17.2411C16.0687 17.6894 16.7928 17.6894 17.2411 17.2411C17.6894 16.7928 17.6894 16.0687 17.2411 15.6204L11.6203 9.99961L17.2411 4.37881C17.6779 3.94202 17.6779 3.20637 17.2411 2.76958Z" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_3172_6333">
                                                                    <rect width="20" height="20" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </el-button>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="bpa-cart__item-expand-view" v-show="typeof bookingpress_cart_details.bookingpress_is_expand != 'undefined' && bookingpress_cart_details.bookingpress_is_expand == 1">
                                            <div class="bpa-cart-iev__head">
                                                <div class="bpa-cart-iev__h-item">
                                                    <div class="bpa-cart-iev__hi-label">{{cart_service_duration_title}}:</div>
                                                    <div class="bpa-cart-iev__hi-val">{{ bookingpress_cart_details.bookingpress_service_duration_val }} {{ bookingpress_cart_details.bookingpress_service_duration_unit }}</div>
                                                </div>
                                                <div class="bpa-cart-iev__h-item" v-if="bookingpress_cart_details.bookingpress_bring_anyone_selected_members != '0' && bookingpress_cart_details.bookingpress_bring_anyone_selected_members !== undefined && !isNaN(bookingpress_cart_details.bookingpress_bring_anyone_selected_members) && bookingpress_cart_details.bookingpress_bring_anyone_selected_members != 1">
                                                    <div class="bpa-cart-iev__hi-label">{{cart_number_person_title}}</div>
                                                    <div class="bpa-cart-iev__hi-val">{{ bookingpress_cart_details.bookingpress_bring_anyone_selected_members }}</div>
                                                </div>
                                                <div class="bpa-cart-iev__h-item" v-if="'undefined' != typeof bookingpress_cart_details.bookingpress_staffmember_name && typeof appointment_step_form_data.hide_staff_selection != 'undefined' && appointment_step_form_data.hide_staff_selection == 'false'">
                                                    <div class="bpa-cart-iev__hi-label">{{cart_staff_title}}:</div>
                                                    <div class="bpa-cart-iev__hi-val">{{bookingpress_cart_details.bookingpress_staffmember_name}}</div>
                                                </div>
                                                <?php do_action('bookingpress_cart_content_add_outside'); ?>
                                            </div>
                                            <div class="bpa-cart-iev__extras-wrap" v-if="bookingpress_cart_details.bookingpress_selected_extras_counter != '0'">
                                                <div class="bpa-cart-exw__title">{{cart_service_extra_title}}</div>
                                                <div class="bpa-cart-exw__items">
                                                    <div class="bpa-cart-exw__item" v-for="(bpa_service_extras, ext_index) in bookingpress_cart_details.bookingpress_selected_extras_details">
                                                        <div class="bpa-cart-exi__left">
                                                            <div class="bpa-cart-exi__name">{{bpa_service_extras.extra_service_name}}</div>
                                                            <div class="bpa-cart-exi-left__opts">
                                                                <div class="bpa-cart-exi__duration" v-if="typeof bpa_service_extras.extra_service_duration_val != 'undefined' && bpa_service_extras.extra_service_duration_val != 0">{{bpa_service_extras.extra_service_duration}}</div>
                                                                <div class="bpa-cart-exi__qty" v-if="typeof bpa_service_extras.extra_service_price_qty != 'undefined' &&bpa_service_extras.extra_service_price_qty != 1">
                                                                    {{cart_service_extra_quantity_title}}
                                                                    {{bpa_service_extras.extra_service_price_qty}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bpa-cart-exi__right">
                                                            <div class="bpa-cart-exi__price">{{bpa_service_extras.extra_service_price_formatted}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>									
                                </div>
                                <div class="bpa-cart__item-total bpa-cart__item-total-deposit" v-if="'undefined' != typeof bookingpress_is_deposit_payment_activate && 1 == bookingpress_is_deposit_payment_activate">
                                    <div class="bpa-cit__item">{{cart_total_amount_title}} <div class="bpa-cit__item-deposit-label">{{cart_deposit_title}}</div></div>
                                    <div class="bpa-cit__item --bpa-is-item-amt">{{ appointment_step_form_data.bookingpress_deposit_total_with_currency }}</div>
                                </div>
                                <div class="bpa-cart__item-total"  v-else>
                                    <div class="bpa-cit__item">{{cart_total_amount_title}}</div>
                                    <div class="bpa-cit__item --bpa-is-item-amt">{{ appointment_step_form_data.bookingpress_cart_total_with_currency }}</div>                                    
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="bpa-cart-module-body--sm">
                            <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                                <div class="bpa-cart-items-wrap--sm">
                                    <div class="bpa-cart-item--sm" :class="(index == appointment_step_form_data.cart_item_edit_index) ? '__bpa-is-active' : ''" v-for="(bookingpress_cart_details, index) in appointment_step_form_data.cart_items">
                                        <div class="bpa-ci__head">
                                            <div class="bpa-ci__head-service-row">
                                            <div class="bpa-hl__service-title">{{bookingpress_cart_details.bookingpress_service_name}}</div>
                                            <div class="bpa-ci__service-price">
                                                <div class="bpa-hl__service-price" v-if="'undefined' != typeof bookingpress_is_deposit_payment_activate && 1 == bookingpress_is_deposit_payment_activate">
                                                    <span class="bpa-ci__service-deposit-price-value">{{ bookingpress_cart_details.bookingpress_deposit_price_with_currency }}<span><br/>
                                                    <span class="bpa-ci__service-full-price-value">of {{ bookingpress_cart_details.bookingpress_service_original_price_with_currency }}</span></div>                                            
                                                <div class="bpa-hl__service-price" v-else>{{ bookingpress_cart_details.bookingpress_service_original_price_with_currency }}</div>                                            
                                            </div>
                                            </div>
                                            <div class="bpa-ci__head-options-row">
                                                <div class="bpa-hl__service-dt-val">
                                                    {{ bookingpress_cart_details.bookingpress_selected_date | bookingpress_format_date }}  
                                                    <span v-show="bookingpress_cart_details.bookingpress_selected_start_time != '' && bookingpress_cart_details.bookingpress_selected_end_time != ''" > {{ bookingpress_cart_details.bookingpress_selected_start_time | bookingpress_format_time }}</span>
                                                    <?php do_action('bookingpress_cart_item_list_service_time_after'); ?>                                                
                                                </div>
                                                <div class="bpa-hl__service-duration">
                                                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3170_6239)">
                                                            <path d="M7.99203 1.33398C4.31203 1.33398 1.33203 4.32065 1.33203 8.00065C1.33203 11.6807 4.31203 14.6673 7.99203 14.6673C11.6787 14.6673 14.6654 11.6807 14.6654 8.00065C14.6654 4.32065 11.6787 1.33398 7.99203 1.33398ZM7.9987 13.334C5.05203 13.334 2.66536 10.9473 2.66536 8.00065C2.66536 5.05398 5.05203 2.66732 7.9987 2.66732C10.9454 2.66732 13.332 5.05398 13.332 8.00065C13.332 10.9473 10.9454 13.334 7.9987 13.334ZM7.85203 4.66732H7.81203C7.54537 4.66732 7.33203 4.88065 7.33203 5.14732V8.29398C7.33203 8.52732 7.45203 8.74732 7.6587 8.86732L10.4254 10.5273C10.652 10.6607 10.9454 10.594 11.0787 10.3673C11.2187 10.1407 11.1454 9.84065 10.912 9.70732L8.33203 8.17398V5.14732C8.33203 4.88065 8.1187 4.66732 7.85203 4.66732Z" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_3170_6239">
                                                                <rect width="16" height="16" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    {{ bookingpress_cart_details.bookingpress_service_duration_val }} {{ bookingpress_cart_details.bookingpress_service_duration_unit }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bpa-ci__body">
                                            <div class="bpa-body__options">
                                                <div class="bpa-bo__item" v-if="bookingpress_cart_details.bookingpress_bring_anyone_selected_members != '0' && bookingpress_cart_details.bookingpress_bring_anyone_selected_members !== undefined && !isNaN(bookingpress_cart_details.bookingpress_bring_anyone_selected_members) && bookingpress_cart_details.bookingpress_bring_anyone_selected_members != 1">
                                                    <div class="bpa-boi__left">{{cart_number_person_title}}:</div>
                                                    <div class="bpa-boi__right">{{ bookingpress_cart_details.bookingpress_bring_anyone_selected_members }}</div>
                                                </div>
                                                <div class="bpa-bo__item" v-if="'undefined' != typeof bookingpress_cart_details.bookingpress_staffmember_name && typeof appointment_step_form_data.hide_staff_selection != 'undefined' && appointment_step_form_data.hide_staff_selection == 'false'">
                                                    <div class="bpa-boi__left">{{cart_staff_title}}:</div>
                                                    <div class="bpa-boi__right">{{bookingpress_cart_details.bookingpress_staffmember_name}}</div>
                                                </div>
                                                <?php do_action('bookingpress_cart_mobile_content_add_outside'); ?>
                                            </div>
                                            <div class="bpa-body__extras-wrap" v-if="bookingpress_cart_details.bookingpress_selected_extras_counter != '0'">
                                                <div class="bpa-bew__head" @click="bookingpress_expand_service_extras(index)" :class="[bookingpress_cart_details.bookingpress_is_extra_expand == 1 ? ' __bpa-is-active' : '']">
                                                    <div class="bpa-bew__head-title">{{cart_service_extra_title}}</div>
                                                    <div class="bpa-bew__head-icon">
                                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 10L8 6L4 10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="bpa-bew__body" v-show="typeof bookingpress_cart_details.bookingpress_is_extra_expand != 'undefined' && bookingpress_cart_details.bookingpress_is_extra_expand == 1">
                                                    <div class="bpa-bew-body__item" v-for="(bpa_service_extras, ext_index) in bookingpress_cart_details.bookingpress_selected_extras_details">
                                                        <div class="bpa-bew-bi__left">
                                                            <div class="bpa-bew-bi__extra-service-title">{{bpa_service_extras.extra_service_name}} 
                                                                <div class="bpa-bew-bi__extra-qty" v-if="typeof bpa_service_extras.extra_service_price_qty != 'undefined' && bpa_service_extras.extra_service_price_qty != 1">x {{bpa_service_extras.extra_service_price_qty}} </div>
                                                                <div class="bpa-bew-bi__extra-duration" v-if="typeof bpa_service_extras.extra_service_duration_val != 'undefined' && bpa_service_extras.extra_service_duration_val != 0">({{bpa_service_extras.extra_service_duration}}) </div>
                                                            </div>
                                                        </div>
                                                        <div class="bpa-bew-bi__right">
                                                            <div class="bpa-bew-bi-extra-price">{{bpa_service_extras.extra_service_price_formatted}}</div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="bpa-bew__action-btns">
                                                <el-button class="bpa-front-btn bpa-front-btn--full-width" @click="bookingpress_edit_cart_item(index)">
                                                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3168_6275)">
                                                            <path d="M2.5 14.5501V17.0835C2.5 17.3168 2.68333 17.5001 2.91667 17.5001H5.45C5.55833 17.5001 5.66667 17.4585 5.74167 17.3751L14.8417 8.28346L11.7167 5.15846L2.625 14.2501C2.54167 14.3335 2.5 14.4335 2.5 14.5501ZM17.2583 5.8668C17.5833 5.5418 17.5833 5.0168 17.2583 4.6918L15.3083 2.7418C14.9833 2.4168 14.4583 2.4168 14.1333 2.7418L12.6083 4.2668L15.7333 7.3918L17.2583 5.8668Z" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_3168_6275">
                                                                <rect width="20" height="20" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    {{cart_edit_item_title}}
                                                </el-button>
                                               
                                                <el-button class="bpa-front-btn bpa-front-btn--full-width" @click="bookingpress_delete_cart_item(index)">
                                                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3172_6333)">
                                                            <path d="M17.2411 2.76958C16.7928 2.3213 16.0687 2.3213 15.6204 2.76958L9.99961 8.37889L4.37881 2.75809C3.93053 2.3098 3.20637 2.3098 2.75809 2.75809C2.3098 3.20637 2.3098 3.93053 2.75809 4.37881L8.37889 9.99961L2.75809 15.6204C2.3098 16.0687 2.3098 16.7928 2.75809 17.2411C3.20637 17.6894 3.93053 17.6894 4.37881 17.2411L9.99961 11.6203L15.6204 17.2411C16.0687 17.6894 16.7928 17.6894 17.2411 17.2411C17.6894 16.7928 17.6894 16.0687 17.2411 15.6204L11.6203 9.99961L17.2411 4.37881C17.6779 3.94202 17.6779 3.20637 17.2411 2.76958Z" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_3172_6333">
                                                                <rect width="20" height="20" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    {{cart_remove_item_title}}
                                                </el-button>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="bpa-cart-total-wrap-sm">                                    
                                    <div class="bpa-cart__item-total bpa-cart__item-total-deposit" v-if="'undefined' != typeof bookingpress_is_deposit_payment_activate && 1 == bookingpress_is_deposit_payment_activate">
                                        <div class="bpa-cit__item">
                                            {{cart_total_amount_title}} 
                                            <div class="bpa-cit__item-deposit-label">{{cart_deposit_title}}</div>
                                        </div>
                                        <div class="bpa-cit__item --bpa-is-item-amt">{{ appointment_step_form_data.bookingpress_deposit_total_with_currency }}</div>
                                    </div>
                                    <div class="bpa-cart__item-total" v-else>
                                        <div class="bpa-cit__item">{{cart_total_amount_title}}</div>
                                        <div class="bpa-cit__item --bpa-is-item-amt">{{ appointment_step_form_data.bookingpress_cart_total_with_currency }}</div>                                    
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </el-col>
            </el-row>
        </div>
        <div class="bpa-front-dc--footer" :class="bookingpress_footer_dynamic_class">
            <el-row>
                <el-col>
                    <div class="bpa-front-tabs--foot">
                        <el-button class="bpa-front-btn bpa-front-btn__medium bpa-front-btn--borderless" @click="bookingpress_step_navigation(bookingpress_sidebar_step_data['cart'].previous_tab_name, bookingpress_sidebar_step_data['cart'].next_tab_name, bookingpress_sidebar_step_data['cart'].previous_tab_name)">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><rect fill="none" height="24" width="24"/><path d="M9.7,18.3L9.7,18.3c0.39-0.39,0.39-1.02,0-1.41L5.83,13H21c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5.83l3.88-3.88 c0.39-0.39,0.39-1.02,0-1.41l0,0c-0.39-0.39-1.02-0.39-1.41,0L2.7,11.3c-0.39,0.39-0.39,1.02,0,1.41l5.59,5.59 C8.68,18.68,9.32,18.68,9.7,18.3z"/></svg>
                            <?php echo esc_html( $bookingpress_goback_btn_text ); ?>
                        </el-button>
                        <el-button class="bpa-front-btn bpa-front-btn__medium bpa-front-btn--primary" @click="bookingpress_step_navigation(bookingpress_sidebar_step_data['cart'].next_tab_name, bookingpress_sidebar_step_data['cart'].next_tab_name, bookingpress_sidebar_step_data['cart'].previous_tab_name)">
                            <?php echo esc_html( $bookingpress_next_btn_text ); ?> <strong class=""><?php echo esc_html( $bookingpress_third_tab_name ); ?></strong>
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><rect fill="none" height="24" width="24"/><path d="M14.29,5.71L14.29,5.71c-0.39,0.39-0.39,1.02,0,1.41L18.17,11H3c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h15.18l-3.88,3.88 c-0.39,0.39-0.39,1.02,0,1.41l0,0c0.39,0.39,1.02,0.39,1.41,0l5.59-5.59c0.39-0.39,0.39-1.02,0-1.41L15.7,5.71 C15.32,5.32,14.68,5.32,14.29,5.71z"/></svg>
                        </el-button>
                    </div>
                </el-col>
            </el-row>
        </div>
    </div>	
</div>
<el-link class="bpa-mob-sticky__cart-btn" @click="bookingpress_navigate_to_cart()" ><!-- @click="bookingpress_step_navigation(bookingpress_sidebar_step_data['datetime'].next_tab_name, bookingpress_sidebar_step_data['datetime'].next_tab_name, bookingpress_sidebar_step_data['cart'].previous_tab_name)" -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 3c0 .55.45 1 1 1h1l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h11c.55 0 1-.45 1-1s-.45-1-1-1H7l1.1-2h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.67-1.43c-.16-.35-.52-.57-.9-.57H2c-.55 0-1 .45-1 1zm16 15c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
</el-link>
